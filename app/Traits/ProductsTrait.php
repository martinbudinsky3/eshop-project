<?php

namespace App\Traits;

trait ProductsTrait
{
    // get all unique colors of products
    private function getUniqueColors($products) {
        $products->load(['colors' => function ($q) use (&$colors) {
            $colors = $q->get()->unique();
        }]);

        return $colors;
    }

    // get all unique brands of products
    private function getUniqueBrands($products) {
        $products->load(['brand' => function ($q) use (&$brands) {
            $brands = $q->get()->unique();
        }]);

        return $brands;
    }

    // get all unique size of products
    private function getUniqueSizes($products) {
        $products->load(['productDesigns' => function ($q) use (&$sizesRecords) {
            $sizesRecords = $q->get()->unique('size');
        }]);

        $sizes = array();
        foreach($sizesRecords as $sizeRecord) {
            array_push($sizes, $sizeRecord->size);
        }

        return $sizes;
    }

    // filtering
    private function filterProducts($products) {
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

    // sorting
    private function sortProducts($products) {
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