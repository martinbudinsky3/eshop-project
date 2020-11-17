<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Product_designTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_designs')->insert([
            [
                'product_id' => '1', //kosela s volanom
                'quantity' => 3,
                'color' => 'modra',
                'size' =>  8,
            ],
            [
                'product_id' => '3', //satenova bluzka
                'quantity' =>  3,
                'color' =>  'zelená',
                'size' =>  12,
            ],
            [
                'product_id' => '2',  //tricko s potlacou
                'quantity' =>  1,
                'color' =>  'biela',
                'size' =>  10,
            ],
            [
                'product_id' => '6', //hnede tricko
                'quantity' =>  4,
                'color' =>  'hnedá',
                'size' =>  20,
            ],
            [
                'product_id' => '4', //detske rukavice
                'quantity' =>  3,
                'color' =>  'fialová',
                'size' =>  19,
            ],
            [
                'product_id' => '5', //rukavice s minie 
                'quantity' =>  2,
                'color' =>  'ružová',
                'size' =>  3,
            ],
    
        ]);
    }
}
