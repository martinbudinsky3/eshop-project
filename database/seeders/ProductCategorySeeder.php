<?php

namespace Database\Seeders;

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
            DB::table('product_categories')->insert([
                [
                    'id' => $id++,
                    'category_id' => $blouseCategoryId,
                    'product_id' => $productId,
                ],
            ]);
        }

        // Shirt category products
        $shirtProductsStart = 65;
        $shirtProductsEnd = 128;
        $shirtCategoryId = 10;

        for($productId = $shirtProductsStart; $productId <= $shirtProductsEnd; $productId++) {
            DB::table('product_categories')->insert([
                [
                    'id' => $id++,
                    'category_id' => $shirtCategoryId,
                    'product_id' => $productId,
                ],
            ]);
        }

        // Kids t-shirts category products
        $tshirtKidsProductsStart = 129;
        $tshirtKidsProductsEnd = 144;
        $tshirtKidsCategoryId = 13;

        for($productId = $tshirtKidsProductsStart; $productId <= $tshirtKidsProductsEnd; $productId++) {
            DB::table('product_categories')->insert([
                [
                    'id' => $id++,
                    'category_id' => $tshirtKidsCategoryId,
                    'product_id' => $productId,
                ],
            ]);
        }
    }
}


