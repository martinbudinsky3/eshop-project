<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();
        $this->call(ProductSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CategoryHierarchySeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(ProductDesignSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(CartItemSeeder::class);

        // \App\Models\Product::factory(10)->create();
    }
}
