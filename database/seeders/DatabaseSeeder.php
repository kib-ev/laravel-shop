<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
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
        (new AdminSeeder())->run();
        User::factory(5)->create();
        ProductCategory::factory(20)->create();
        Product::factory(125)->create();
        Cart::factory('5')->create();
    }
}
