<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDesign;
use App\Models\Color;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Traits\ProductsTrait;


class CategoryController extends Controller
{
    use ProductsTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentCategories = Category::with('childCategories')->doesnthave('parentCategories')->get();

        return response()->json($parentCategories);
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
        $category = Category::find($id);
        $products = Product::whereHas('categories', function ($cat) use ($id) {
            $cat->where('categories.id', $id);
        });

        if($products->get()->isEmpty()) {
            return view('templates.product-category')
                ->with('category', $category)
                ->with('products', $products->get())
                ->with('search', FALSE);
        }
        
        $recommendedProducts = Product::whereHas('categories', function ($cat) use ($id) {
            $cat->where('categories.id', $id);
        })->inRandomOrder()->take(12)->get();

        // get unique products attributes
        $colors = $this->getUniqueColors($products->get());
        $brands = $this->getUniqueBrands($products->get());
        $sizes = $this->getUniqueSizes($products->get());

        // filtering
        $products = $this->filterProducts($products);
        
        // sorting
        $products = $this->sortProducts($products);

        // pagination
        $products = $products->paginate(12)->appends(request()->query());

        return view('templates.product-category')
            ->with('category', $category)
            ->with('products', $products)
            ->with('recommendedProducts', $recommendedProducts)
            ->with('colors', $colors)
            ->with('brands', $brands)
            ->with('sizes', $sizes)
            ->with('search', FALSE);
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

    private function filterProducts($products) {
        // filtering
        $filterColors = request()->get('color');
        $filterSizes = request()->get('size');
        $filterBrand = request()->get('brand');
        
        if($filterColors) {
            $products = $products->whereHas('colors', function ($col) use ($filterColors) {
                $col->whereIn('colors.id', $filterColors);
            });
        }

        if($filterSizes) {
            $products = $products->whereHas('productDesigns', function ($size) use ($filterSizes) {
                $size->whereIn('product_designs.size', $filterSizes);
            });
        }

        if($filterBrand) {
            $products = $products->whereIn('brand_id', $filterBrand);
        }

        return $products;
    }

    private function sortProducts($products) {
        // sorting
        $sortOrder = request()->get('sort');

        switch ($sortOrder) {
            case 1:
                $products = $products->orderBy('price', 'asc');
                break;

            case 2:
                $products = $products->orderBy('price', 'desc');
                break;

            default:
                $products = $products->orderBy('price', 'asc');
        }

        return $products;
    }
}
