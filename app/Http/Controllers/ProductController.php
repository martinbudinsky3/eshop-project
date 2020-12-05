<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDesign;
use App\Traits\ProductsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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

        Log::debug(sizeof($filteredProducts));

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

        // pagination
        // IFF rowsPerPage == 0, load ALL rows
        if ($rowsPerPage == 0) {
            // load all products from DB
            $products = DB::table('products')
                ->orderBy($sortBy, $descending)
                ->get();
        } else {
            $offset = ($page - 1) * $rowsPerPage;

            // load products from DB
            $products = DB::table('products')
                ->orderBy($sortBy, $descending)
                ->offset($offset)
                ->limit($rowsPerPage)
                ->get();
        }

        // total number of rows -> for quasar data table pagination
        $rowsNumber = DB::table('products')->count();

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
        // validations and error handling is up to you!!! ;)
        /*
        $request->validate([
        'name' => 'required|min:3',
        'description' => 'required',
        ]);
         */

        $product = Product::create(['name' => $request->name, 'description' => $request->description]);

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
        $product = Product::find($id);
        
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
        // validations and error handling is up to you!!! ;)
        /*
        $request->validate([
        'name' => 'required|min:3',
        'description' => 'required',
        ]);
         */

        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
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
