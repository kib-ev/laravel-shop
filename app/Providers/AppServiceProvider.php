<?php

namespace App\Providers;

use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Product::whereIn('id', config('site.featured_products'))->update([ // TODO: remove
            'featured' => 1
        ]);

        Paginator::defaultView('vendor.pagination.bootstrap-4');
    }
}
