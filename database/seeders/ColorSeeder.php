<?php

namespace Database\Seeders;

use App\Models\Color;
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

        Color::insert([
            [
                'name' => 'biela',
                'hex_code' => 'FFFFFF',
            ],
            [
                'name' => 'červená',
                'hex_code' => 'FF0000',
            ],
            [
                'name' => 'čierna',
                'hex_code' => '000000',
            ],
            [
                'name' => 'fialová',
                'hex_code' => '800080',
            ],
            [
                'name' => 'hnedá',
                'hex_code' => 'A52A2A',
            ],
            [
                'name' => 'modrá',
                'hex_code' => '0000FF',
            ],
            [
                'name' => 'oranžová',
                'hex_code' => 'FFA500',
            ],
            [
                'name' => 'ružová',
                'hex_code' => 'FFE4E1',
            ],
            [
                'name' => 'zelená',
                'hex_code' => '008000',
            ],
            [
                'name' => 'žltá',
                'hex_code' => 'FFFF00',
            ],
        ]);
    }
}
