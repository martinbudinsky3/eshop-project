<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' =>'Muži',
            ],
            [  
                'id' => 2,
                'name' =>'Ženy',
            ],
            [
                'id' => 3,
                'name' =>'Deti',
            ],

            // women categories
            [
                'id' => 4,
                'name' =>'Tričká',
            ],
            [
                'id' => 5,
                'name' =>'Blúzky',
            ],
            [
                'id' => 6,
                'name' =>'Šaty',
            ],
            [
                'id' => 7,
                'name' =>'Nohavice',
            ],
            [
                'id' => 8,
                'name' =>'Svetre',
            ],
            

            // men categories
            [
                'id' => 9,
                'name' =>'Tričká',
            ],
            [
                'id' => 10,  
                'name' =>'Košele',
            ],
            [
                'id' => 11,
                'name' =>'Nohavice',
            ],
            [
                'id' => 12,
                'name' =>'Obleky',
            ],

            // kids categories
            [
                'id' => 13,
                'name' =>'Tričká',
            ],
            [
                'id' => 14,
                'name' =>'Kombinézy',
            ],
            [
                'id' => 15,
                'name' =>'Svetre',
            ],
            [
                'id' => 16,
                'name' =>'Mikiny',
            ],
        ]);
    }
}
