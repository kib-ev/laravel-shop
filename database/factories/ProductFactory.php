<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $faker = $this->faker;

        return [
            'name' => ucfirst($faker->words(rand(1,5), true)),
            'excerpt' => $faker->realText(rand(100, 200)),
            'description' => $faker->realText(rand(300, 1000)),
            'price' => $faker->randomFloat(2,200,500),
            'price_old' => rand(0, 1) ? 0 : $faker->randomFloat(2,500,700),
            'count' => $faker->randomFloat(0, 0, 10) * 10,
            'image_path' => '/themes/images/products/'.$this->faker->randomFloat(0, 1, 12).'.jpg',
            'created_at' => $created_at = $faker->dateTimeBetween('-2 months', '-1 days'),
            'updated_at' => $created_at,
        ];
    }
}
