<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Faker\Generator as faker;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Moderné Tričko','Sviatočná Košeľa','Teplé rukavice','Saténová blúzka']),
            'brand' => $this->faker->randomElement(['Esmara','ONLY','H&M']),
            'price' => $this->faker->randomFloat(2, 1, 100 ), // 48.8932
        ];
    }
}
