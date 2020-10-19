<?php

function cart()
{
    return \App\Models\Cart::getFromSession();
}

function set_locale_url($locale)
{
    return \App\Http\Middleware\SetLocale::set_locale_url($locale);
}

function set_currency_url($locale)
{
    return \App\Http\Middleware\SetCurrency::set_currency_url($locale);
}

function meta()
{
    // meta added in \App\Http\Middleware\AddMeta.php
    return request()->meta;
}

function page_element($name)
{
    $element = null;

    if ($name === 'sidebar-menu') {
        $seconds = 60 * 60 * 24;
        $categories = \Illuminate\Support\Facades\Cache::remember('sidebar', $seconds, function () {
            return \App\Models\ProductCategory::with('products:id,category_id', 'childrenCategories:id,name,parent_id', 'childrenCategories.products:id,category_id')->get();
        });

        $categoryCssClass = [];
        $categories->each(function ($item) use (&$categoryCssClass) {
            if (route('products.categories.show', $item->id) == request()->url()) {
                $categoryCssClass[$item->id] = 'active';
                $categoryCssClass[$item->parent_id] = 'active';
            } else {
                $categoryCssClass[$item->id] = '';
            }
        });

        $element = view('public.layouts.includes.sidebar-menu', compact('categories', 'categoryCssClass'))->render();
    }

    return $element;
}
