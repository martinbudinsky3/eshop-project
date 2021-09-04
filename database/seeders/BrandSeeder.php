<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Esmara', 'ONLY', 'H&M', 'Fashionweek', 'RAINBOW', 'bpc', 'H&M kids', 'Happy kids', 'emoji'];

        foreach($names as $name) {
            Brand::create([
                'name' => $name
            ]);
        }
    }
}
