<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductDesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productsSize = 144;
        $sizes = ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL'];

        for($productId = 1; $productId <= $productsSize; $productId++) {
            $colors_size = mt_rand(1, 3);
            $colorId = mt_rand(1, 10);

            for($i = 0; $i < $colors_size; $i++) {
                $sizesSize = mt_rand(1, 6);
                $sizeIndex = mt_rand(0, 6);

                for($j = 0; $j < $sizesSize; $j++) {
                    ProductDesign::create([
                        'product_id' => $productId,
                        'quantity' => mt_rand(1, 50),
                        'color_id' => $colorId % 10 + 1,
                        'size' =>  $sizes[$sizeIndex % 7]
                    ]);

                    $sizeIndex += 2;
                }

                $colorId += 3;
            }
        }
    }
}
