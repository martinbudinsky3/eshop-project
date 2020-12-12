<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDesign;
use App\Models\ProductCategory;
use App\Traits\ProductsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;


class ProductController extends Controller
{
    use ProductsTrait;
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // random products
        $recommendedProducts = Product::inRandomOrder()->take(12)->get();

        $searchTerm = request()->get('search');

        // filtering based on search term
        $filteredProducts = Product::all()->filter(function ($product) use ($searchTerm) {
            if (Str::is('*' . $this->transformString($searchTerm) . '*', $this->transformString($product->name))) {
                return $product;
            };
        });

        // get unique attributes for filtered products
        $colors = $this->getUniqueColors($filteredProducts);
        $brands = $this->getUniqueBrands($filteredProducts);
        $sizes = $this->getUniqueSizes($filteredProducts);

        // get filtered products ids
        $filteredProductsIds = $filteredProducts->map(function ($product) {
            return $product->id;
        });

        // query filtered products
        $products = Product::whereIn('id', $filteredProductsIds);

        $products = $this->filterProducts($products);
        $products = $this->sortProducts($products);

        $products = $products->paginate(12)->appends(request()->query());

        return view('templates.product-category')
            ->with('title', 'Vyhľadávanie')
            ->with('products', $products)
            ->with('recommendedProducts', $recommendedProducts)
            ->with('colors', $colors)
            ->with('brands', $brands)
            ->with('sizes', $sizes)
            ->with('search', true);
    }

    function list($page) {
        Log::debug("List");

        // get rowsPerPage from query parameters (after ?), if not set => 5
        $rowsPerPage = request('rowsPerPage', 5);

        // get sortBy from query parameters (after ?), if not set => name
        $sortBy = request('sortBy', 'name');

        // get descending from query parameters (after ?), if not set => false
        $descendingBool = request('descending', 'false');
        // convert descending true|false -> desc|asc
        $descending = $descendingBool === 'true' ? 'desc' : 'asc';

        $filter = request('filter', '');
        
        // filtering based on search term
        $filteredProducts = Product::orderBy($sortBy, $descending)->get()->filter(function ($product) use ($filter) {
            if (Str::is('*' . $this->transformString($filter) . '*', $this->transformString($product->name))) {
                return $product;
            };
        });

        if ($rowsPerPage > 0) {

            $offset = ($page - 1) * $rowsPerPage;

            $products = $filteredProducts->slice($offset, $rowsPerPage)->values();

            $rowsNumber = count($products);
        } else {
            $products = $filteredProducts;
        }
        
        $rowsNumber = count($filteredProducts);

        return response()->json(['rows' => $products, 'rowsNumber' => $rowsNumber]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation      
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'brand_id' => 'required',
            'material' => 'required',
            'product_designs' => 'required|array',
            'product_designs.*.color' => 'required|array',
            'product_designs.*.size' => 'required',
            'product_designs.*.quantity' => 'required'
        ]);

        Log::debug($request);
        $productDesigns = $request->product_designs;

        DB::transaction(function() use ($productDesigns, $request, &$product) {
            $product = Product::create([
                        'name' => $request->name,
                        'description' => $request->description,
                        'price' => $request->price,
                        'brand_id' =>  $request->brand_id,
                        'material' => $request->material
                    ]);

            foreach($productDesigns as $productDesign) {
                ProductDesign::create([
                    'color_id' => $productDesign['color']['id'],
                    'size' => $productDesign['size'],
                    'quantity' => $productDesign['quantity'],
                    'product_id' => $product->id
                ]);
            }

            ProductCategory::create([
                'product_id' => $product->id,
                'category_id' => $request->category_id
            ]);

        });

        return response()->json(['id' => $product->id]);

        // return response()->json(['id' => 1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $product = Product::find($id);

        // random products from same category
        $similar_products = Product::whereHas('categories', function ($cat) use ($product) {
            $cat->where('categories.id', '=', $product->categories->first()->id);
        })->where('id', '!=', $id)->take(12)->get();

        if(sizeof($similar_products) < 12) {
            $similar_products = Product::where('id', '!=', $id)->inRandomOrder()->take(12)->get();
        }

        // get all unique colors for given product
        $liste_color = $this->getUniqueColors($product);

        // get selected color
        $selectedColor = request()->get('color');
        if (!$selectedColor) {
            $selectedColor = $liste_color[0]->id;
        }

        // get only product designs of selected color
        $productOfColor = ProductDesign::where('product_id', '=', $id)->where('color_id', '=', $selectedColor);

        // get all unique sizes of selected color product design
        $liste_size = $productOfColor->distinct()->get(['size']);

        // get product images
        $liste_images = [];
        foreach ($product->images as $image) {
            array_push($liste_images, $image->path);
        }

        return view('templates.product-detail')
            ->with('product', $product)
            ->with('similar_products', $similar_products)
            ->with('liste_images', $liste_images)
            ->with('liste_color', $liste_color)
            ->with('liste_size', $liste_size);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = Product::with('categories.parentCategories', 'productDesigns.color', 'brand')->find($id);
        
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validation
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'brand_id' => 'required',
            'material' => 'required',
            'product_designs' => 'required|array',
            'product_designs.*.color' => 'required|array',
            'product_designs.*.size' => 'required',
            'product_designs.*.quantity' => 'required'
        ]);
        
        // update product
        
        $product = Product::find($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->brand_id = $request->brand_id;
        $product->material = $request->material;
        
        $product->save();

        // destroy deleted product designs
        $deletedProductDesigns = $request->deleted_designs;
        foreach($deletedProductDesigns as $deletedProductDesign) {

            $designToDelete = ProductDesign::find($deletedProductDesign['id']);
            $designToDelete->delete();
        }

        // update or create product designs
        $productDesigns = $request->product_designs;
        foreach($productDesigns as $productDesign) {
            if(!isset($productDesign['id'])) { // create product design

                ProductDesign::create([
                    'color_id' => $productDesign['color']['id'],
                    'size' => $productDesign['size'],
                    'quantity' => $productDesign['quantity'],
                    'product_id' => $product->id
                ]);
            } else { // update existing product design
                $oldProductDesign = ProductDesign::find($productDesign['id']);
                $oldProductDesign->color_id = $productDesign['color']['id'];
                $oldProductDesign->size = $productDesign['size'];
                $oldProductDesign->quantity = $productDesign['quantity'];

                $oldProductDesign->save();
            }
        }
        
        // update product category
        $oldProductCategory = ProductCategory::where('product_id', $id)->first();
        $oldProductCategory->category_id = $request->category_id;

        $oldProductCategory->save();

        // delete images
        $deletedImages = $request->deleted_images;

        foreach($deletedImages as $deletedImage) {
            Log::debug($deletedImage);

            // delete physically
            $directory = dirname($deletedImage['path']);

            Storage::deleteDirectory($directory);

            // delete from db
            Image::where('id', $deletedImage['id'])->delete();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        // error handling is up to you!!! ;)
        return response()->json(['status' => 'success', 'msg' => 'Product deleted successfully']);
    }

    private function transformString($str)
    {
        $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $str = preg_replace('/[^a-zA-Z0-9]/', '', $str);
        $str = strtolower($str);

        return $str;
    }

    public function sortSize($data_arr)
    {
        $sizes_arr = array('XXS' => 0, 'XS' => 1, 'S' => 2, 'M' => 3, 'L' => 4, 'XL' => 5, 'XXL' => 6);
        $data_sort_arr = array();
        foreach ($data_arr as $value) {
            $size_item_arr = explode(':', $value);
            $size_item_str = trim($size_item_arr[0]);

            $size_pos_int = intval($sizes_arr[$size_item_str]);

            $data_sort_arr[$size_pos_int] = $value;
        }
        ksort($data_sort_arr);
        return array_values($data_sort_arr);
    }
}
