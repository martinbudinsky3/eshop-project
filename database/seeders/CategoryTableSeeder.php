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
        'name' =>'Muži',
    ],
        [  
        'name' =>'Ženy',
    ],
        [
        'name' =>'Deti',
    ],
    [
        'name' =>'Tričká',
    ],
        [  
        'name' =>'Košele',
    ],
        [
        'name' =>'Rukavice',
    ],
    ]);
    }
}
