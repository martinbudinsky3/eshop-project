<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\ProductsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


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
            ->with('colors', $colors)
            ->with('brands', $brands)
            ->with('sizes', $sizes)
            ->with('search', true);
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
        //
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
        $similar_products = Product::whereHas('categories', function ($cat) use ($product) {
            $cat->where('categories.id','=',  $product->categories->first()->id);
        })->where('id', '!=', $id)->take(12)->get();

        $liste_size = $this->getUniqueSizes($product);
        $liste_size = $this->sortSize($liste_size);
        $liste_color = $this->getUniqueColors($product);

        $liste_images = [];
        foreach ($product->images as $image) {
            array_push($liste_images, $image->path);
        }

        return view('templates.product-detail')
            ->with('product', $product)
            ->with('similar_products', $similar_products)
            ->with('liste_images', $liste_images)
            ->with('liste_color', $liste_color)
            ->with('liste_size', $liste_size)
            ->with('cart', $cart);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
