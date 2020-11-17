<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Category_hierarchyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_hierarchies')->insert([
        [
            'parent_category_id' =>'1', //muzi
            'child_category_id' =>'4',  //tricka
        ],
        [  
            'parent_category_id' =>'2', //zeny
            'child_category_id' =>'5',  //kosele
        ],
        [
            'parent_category_id' =>'3', //deti
            'child_category_id' =>'6',  //tukavice
        ],
    ]);
        
    }
}

