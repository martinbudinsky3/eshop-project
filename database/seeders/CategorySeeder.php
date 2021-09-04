<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Muži', 'Ženy', 'Deti', // main categories
            'Tričká', 'Blúzky', 'Šaty', 'Nohavice', 'Svetre', // women categories
            'Tričká','Košele', 'Nohavice', 'Obleky', // men categories
            'Tričká', 'Kombinézy', 'Svetre', 'Mikiny' // kids categories
        ];

        foreach ($names as $name) {
            Category::create([
                'name' => $name
            ]);
        }
    }
}
