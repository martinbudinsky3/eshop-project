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
        $this->call(BrandSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CategoryHierarchySeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(ProductDesignSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(RoleAndUserSeeder::class);
        $this->call(TransportSeeder::class);
        $this->call(PaymentSeeder::class);
    }
}
