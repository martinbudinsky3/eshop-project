<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('products')->insert([
            [
                'name' =>'Košeľa s volánom',
                'brand' => 'Esmara',
                'price' => 19.99,
            ],
            [  
                'name' =>'Tričko s potlačou',
                'brand' => 'ONLY',
                'price' => 29.99,
            ],
            [
                'name' =>'Saténová blúzka',
                'brand' => 'H&M',
                'price' => 9.99,
            ],
            [
                'name' =>'Detské rukavice',
                'brand' => 'happy_kids',
                'price' => 9.99,
            ],
            [
                'name' =>'Rukavice s Minnie',
                'brand' => 'H&M_kids',
                'price' => 5.99,
            ],
            [  
                'name' =>'Hnedé tričko',
                'brand' => 'ONLY',
                'price' => 19.99,
            ],
            
        ]);

    }
}
