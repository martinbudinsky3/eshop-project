<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Product_categoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
            [
                'category_id' => '5', //zeny kosele
                'product_id' => '1', //kosela s volanom
            ],
            [
                'category_id' => '5', //zeny kosele
                'product_id' => '3', //satenova bluzka
            ],
            [
                'category_id' => '4', //muzi tricka 
                'product_id' => '2',  //tricko s potlacou
            ],
            [
                'category_id' => '4', //muzi tricka 
                'product_id' => '6', //hnede tricko
            ],
            [
                'category_id' => '6', //deti rukavice
                'product_id' => '4', //detske rukavice
            ],
            [
                'category_id' => '6', //deti rukavice 
                'product_id' => '5', //rukavice s minie 
            ],
    
        ]);
    }
}


    