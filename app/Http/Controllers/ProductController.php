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
use App\Services\ImageService;

class ProductController extends Controller
{
    use ProductsTrait;
    
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

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
    public function store(ProductRequest $request)
    {
        // validation      
        $validated = $request->validate();

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
            
            $this->imageService->store($request->file('image'), $product->id);
        });

        return response()->json(['id' => $product->id]);

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
    public function update(ProductRequest $request, $id)
    {
        // validation
        $validated = $request->validate();
        
        DB::transaction(function() use($request, $id) {

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
            $this->deleteImages($deletedImages);
        });

        return response()->json(['status' => 'success', 'msg' => 'Product updated successfully']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get images to delete
        $deletedImages = Image::where('product_id', $id)->get();

        $product = Product::find($id);

        DB::transaction(function() use($product, $deletedImages) {
            $product->delete();

            // delete images
            $this->deleteImages($deletedImages);
        });

        return response()->json(['status' => 'success', 'msg' => 'Product deleted successfully']);
    }

    private function transformString($str)
    {
        $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $str = preg_replace('/[^a-zA-Z0-9]/', '', $str);
        $str = strtolower($str);

        return $str;
    }

    public function deleteImages($deletedImages) {
        foreach($deletedImages as $deletedImage) {

            // delete physically
            $directory = dirname($deletedImage['path']);

            Storage::deleteDirectory($directory);

            // delete from db
            Image::where('id', $deletedImage['id'])->delete();
        }
    }

}
