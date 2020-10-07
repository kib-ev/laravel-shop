<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

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

        $categoriesIds = Arr::pluck(ProductCategory::select('id')->where('parent_id', '!=', 0)->get()->toArray(), 'id');

        return [
            'name' => ucfirst($faker->words(rand(1, 4), true)),
            'excerpt' => $faker->realText(rand(100, 200)),
            'description' => $faker->realText(rand(300, 1000)),
            'category_id' => Arr::random($categoriesIds),
            'price' => $faker->randomFloat(2, 200, 500),
            'price_old' => rand(0, 1) ? 0 : $faker->randomFloat(2, 500, 700),
            'featured' => rand(0, 20) == 1,
            'count' => $faker->randomFloat(0, 0, 10) * 10,
            'image_path' => '/themes/images/products/' . $this->faker->randomFloat(0, 1, 12) . '.jpg',
            'created_at' => $created_at = $faker->dateTimeBetween('-2 months', '-1 days'),
            'updated_at' => $created_at,
        ];
    }
}
