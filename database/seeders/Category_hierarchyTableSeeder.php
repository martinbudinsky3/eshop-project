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
        $id = 1;

        DB::table('category_hierarchies')->insert([
            // women categories hierarchy
            [   
                'id' => $id++,
                'parent_category_id' =>'2', 
                'child_category_id' =>'4',
            ],
            [   
                'id' => $id++,
                'parent_category_id' =>'2', 
                'child_category_id' =>'5',
            ],
            [   
                'id' => $id++,
                'parent_category_id' =>'2', 
                'child_category_id' =>'6',
            ],
            [   
                'id' => $id++,
                'parent_category_id' =>'2', 
                'child_category_id' =>'7',
            ],
            [   
                'id' => $id++,
                'parent_category_id' =>'2', 
                'child_category_id' =>'8',
            ],

            // men categories hierarchy
            [
                'id' => $id++,
                'parent_category_id' =>'1', 
                'child_category_id' =>'9',
            ],
            [
                'id' => $id++,
                'parent_category_id' =>'1', 
                'child_category_id' =>'10',
            ],
            [
                'id' => $id++,
                'parent_category_id' =>'1', 
                'child_category_id' =>'11',
            ],
            [
                'id' => $id++,
                'parent_category_id' =>'1', 
                'child_category_id' =>'12',
            ],

            // kids categories hierarchy
            [
                'id' => $id++,
                'parent_category_id' =>'3',
                'child_category_id' =>'13',  
            ],
            [
                'id' => $id++,
                'parent_category_id' =>'3',
                'child_category_id' =>'14',  
            ],
            [
                'id' => $id++,
                'parent_category_id' =>'3',
                'child_category_id' =>'15',  
            ],
            [
                'id' => $id++,
                'parent_category_id' =>'3',
                'child_category_id' =>'16',  
            ],
        ]); 
    }
}

