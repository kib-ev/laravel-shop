<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use App\View\Components\AppLayout;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCategoryFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductCategory::class;

    protected $parentIds = [0, 0, 0, 0, 1, 1, 1, 1, 2, 4, 1, 2, 3, 2, 2, 2, 3, 4, 3, 4];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {

        $faker = $this->faker;

        $result = [
            'parent_id' => current($this->parentIds),
            'name' => ucfirst($faker->words(rand(1, 3), true)),
            'excerpt' => $faker->realText(rand(100, 200)),
            'description' => $faker->realText(rand(300, 1000)),
            'created_at' => $created_at = $faker->dateTimeBetween('-2 months', '-1 days'),
            'updated_at' => $created_at,
        ];

        if (next($this->parentIds) === null) {
            reset($this->parentIds);
        }

        return $result;
    }

}
