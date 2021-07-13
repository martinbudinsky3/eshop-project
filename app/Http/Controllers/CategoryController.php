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

        if(sizeof($products->get()) >= 12) {
            $recommendedProducts = Product::whereHas('categories', function ($cat) use ($id) {
                $cat->where('categories.id', $id);
            })->inRandomOrder()->take(12)->get();
        } else {
            $recommendedProducts = Product::inRandomOrder()->take(12)->get();
        }


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
}
