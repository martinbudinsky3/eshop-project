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
        $id = 1;
        $products_size = 144;
        $sizes = ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL'];

        for($product_id = 1; $product_id <= $products_size; $product_id++) {
            $colors_size = mt_rand(1, 3);

            $color_id = mt_rand(1, 10);
            for($i = 0; $i < $colors_size; $i++) {
                $sizes_size = mt_rand(1, 6);

                $size_index = mt_rand(0, 6);
                for($j = 0; $j < $sizes_size; $j++) {
                    DB::table('product_designs')->insert([
                        [
                            'id' => $id++,
                            'product_id' => $product_id,
                            'quantity' => mt_rand(1, 50),
                            'color_id' => $color_id % 10 + 1,
                            'size' =>  $sizes[$size_index % 7],
                            'created_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s'),
                        ],

                    ]);

                    $size_index += 2;
                }

                $color_id += 3;
            }
        }
    }
}
