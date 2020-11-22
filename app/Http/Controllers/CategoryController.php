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


class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        // get unique products attributes
        $colors = $this->getUniqueColors($products) ;
        $brands = $this->getUniqueBrands($products);
        $sizes = $this->getUniqueSizes($products);

        // filtering
        $products = $this->filterProducts($products);
        
        // sorting
        $products = $this->sortProducts($products);

        // pagination
        $products = $products->paginate(12)->appends(request()->query());

        return view('templates.product-category')
            ->with('category', $category)
            ->with('products', $products)
            ->with('colors', $colors)
            ->with('brands', $brands)
            ->with('sizes', $sizes);
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

    private function getUniqueColors($products) {
        // get all unique colors that occur in this category
        $products->get()->load(['colors' => function ($q) use (&$colors) {
            $colors = $q->get()->unique();
        }]);

        return $colors;
    }

    private function getUniqueBrands($products) {
        // get all unique brands that occur in this category
        $products->get()->load(['brand' => function ($q) use (&$brands) {
            $brands = $q->get()->unique();
        }]);

        return $brands;
    }

    private function getUniqueSizes($products) {
        // get all unique sizes that occur in this category
        $products->get()->load(['productDesigns' => function ($q) use (&$sizesRecords) {
            $sizesRecords = $q->get()->unique('size');
        }]);

        $sizes = array();
        foreach($sizesRecords as $sizeRecord) {
            array_push($sizes, $sizeRecord->size);
        }

        return $sizes;
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
