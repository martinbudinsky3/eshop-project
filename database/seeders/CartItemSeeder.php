<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cartItems')->insert([
            [
                'id' => 1,
                'cart_id' =>'2',
                'product_id' => '5',
                'product_design_id' =>'29',
                'amount' => '2',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'cart_id' =>'1',
                'product_id' => '6',
                'product_design_id' =>'33',
                'amount' => '1',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'cart_id' =>'1',
                'product_id' => '8',
                'product_design_id' =>'45',
                'amount' => '2',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
