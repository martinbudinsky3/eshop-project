<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryHierarchySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_hierarchies')->insert([
            // women categories hierarchy
            [
                'parent_category_id' =>'2',
                'child_category_id' =>'4',
            ],
            [
                'parent_category_id' =>'2',
                'child_category_id' =>'5',
            ],
            [
                'parent_category_id' =>'2',
                'child_category_id' =>'6',
            ],
            [
                'parent_category_id' =>'2',
                'child_category_id' =>'7',
            ],
            [
                'parent_category_id' =>'2',
                'child_category_id' =>'8',
            ],

            // men categories hierarchy
            [
                'parent_category_id' =>'1',
                'child_category_id' =>'9',
            ],
            [
                'parent_category_id' =>'1',
                'child_category_id' =>'10',
            ],
            [
                'parent_category_id' =>'1',
                'child_category_id' =>'11',
            ],
            [
                'parent_category_id' =>'1',
                'child_category_id' =>'12',
            ],

            // kids categories hierarchy
            [
                'parent_category_id' =>'3',
                'child_category_id' =>'13',
            ],
            [
                'parent_category_id' =>'3',
                'child_category_id' =>'14',
            ],
            [
                'parent_category_id' =>'3',
                'child_category_id' =>'15',
            ],
            [
                'parent_category_id' =>'3',
                'child_category_id' =>'16',
            ],
        ]);
    }
}

