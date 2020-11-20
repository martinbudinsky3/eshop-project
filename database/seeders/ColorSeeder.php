<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 1;

        DB::table('colors')->insert([
            [
                'id' => $id++,
                'name' => 'biela',
                'hex_code' => 'FFFFFF',
            ],
            [
                'id' => $id++,
                'name' => 'červená',
                'hex_code' => 'FF0000',
            ],
            [
                'id' => $id++,
                'name' => 'čierna',
                'hex_code' => '000000',
            ],
            [
                'id' => $id++,
                'name' => 'fialová',
                'hex_code' => '800080',
            ],
            [
                'id' => $id++,
                'name' => 'hnedá',
                'hex_code' => 'A52A2A',
            ],
            [
                'id' => $id++,
                'name' => 'modrá',
                'hex_code' => '0000FF',
            ],
            [
                'id' => $id++,
                'name' => 'oranžová',
                'hex_code' => 'FFA500',
            ],
            [
                'id' => $id++,
                'name' => 'ružová',
                'hex_code' => 'FFE4E1',
            ],
            [
                'id' => $id++,
                'name' => 'zelená',
                'hex_code' => '008000',
            ],
            [
                'id' => $id++,
                'name' => 'žltá',
                'hex_code' => 'FFFF00',
            ],

        ]); 
    }
}
