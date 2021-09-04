<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 1;

        // Blouse category products
        $blouseProductsSize = 64;
        $blouseCategoryId = 5;

        for($productId = 1; $productId <= $blouseProductsSize; $productId++) {
            $product = Product::find($productId);
            $product->categories()->attach($blouseCategoryId);
        }

        // Shirt category products
        $shirtProductsStart = 65;
        $shirtProductsEnd = 128;
        $shirtCategoryId = 10;

        for($productId = $shirtProductsStart; $productId <= $shirtProductsEnd; $productId++) {
            $product = Product::find($productId);
            $product->categories()->attach($shirtCategoryId);
        }

        // Kids t-shirts category products
        $tshirtKidsProductsStart = 129;
        $tshirtKidsProductsEnd = 144;
        $tshirtKidsCategoryId = 13;

        for($productId = $tshirtKidsProductsStart; $productId <= $tshirtKidsProductsEnd; $productId++) {
            $product = Product::find($productId);
            $product->categories()->attach($tshirtKidsCategoryId);
        }
    }
}


