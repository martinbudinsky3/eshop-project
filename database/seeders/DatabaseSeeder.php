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
        $this->call(ProductsTableSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(Category_hierarchyTableSeeder::class);
        $this->call(Product_categoryTableSeeder::class);
        $this->call(productDesignTableSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(CartItemSeeder::class);

        // \App\Models\Product::factory(10)->create();
    }
}
