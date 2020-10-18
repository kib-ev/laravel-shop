<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
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
        Paginator::defaultView('vendor.pagination.bootstrap-4');

        View::composer('public.*', function ($view) {
            // TODO add ComposerServiceProvider and cache view
            $menuCategories = ProductCategory::with('products:id,category_id', 'childrenCategories:id,name,parent_id', 'childrenCategories.products:id,category_id')->get();

//            $menuCategories = Cache::remember('menu_categories', 600, function () {
//                return ProductCategory::with('products:id,category_id', 'childrenCategories:id,name,parent_id', 'childrenCategories.products:id,category_id')->get();
//            });

            $view->with([
                'categories' => $menuCategories
            ]);
        });

    }
}
