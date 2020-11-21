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

        $colors = $this->getUniqueColors($id) ;
        $brands = $this->getUniqueBrands($id);
        $sizes = $this->getUniqueSizes($id);
        
        $products = $category->products();

        // filtering
        $filterColors = request()->get('color');
        $filterSizes = request()->get('size');
        $filterBrand = request()->get('brand');

        // whereIn

        // sorting
        $sortOrder = request()->get('sort');
        switch ($sortOrder) {
            case 1:
                $category->setRelation('products', $products->orderBy('price', 'asc')->paginate(12)->appends(request()->query()));
                break;

            case 2:
                $category->setRelation('products', $products->orderBy('price', 'desc')->paginate(12)->appends(request()->query()));
                break;

            default:
                $category->setRelation('products', $products->orderBy('price', 'asc')->paginate(12)->appends(request()->query()));
            
        }

        return view('templates.product-category')
            ->with('category', $category)
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

    public function getUniqueColors($id) {
        // get all unique colors that occur in this category
        $category2 = Category::find($id);
        $category2->load(['products.colors' => function ($q) use (&$colors) {
            $colors = $q->get()->unique();
        }]);

        return $colors;
    }

    private function getUniqueBrands($id) {
        // get all unique brands that occur in this category
        $category2 = Category::find($id);
        $category2->load(['products.brand' => function ($q) use (&$brands) {
            $brands = $q->get()->unique();
        }]);

        return $brands;
    }

    private function getUniqueSizes($id) {
        $category2 = Category::find($id);
        $category2->load(['products.productDesigns' => function ($q) use (&$sizesRecords) {
            $sizesRecords = $q->get()->unique('size');
        }]);

        $sizes = array();
        foreach($sizesRecords as $sizeRecord) {
            array_push($sizes, $sizeRecord->size);
        }

        return $sizes;
    }
}
