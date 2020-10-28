<?php

function cart(): \App\Models\Cart
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

function meta():\App\Models\Meta
{
    // meta added in \App\Http\Middleware\AddMeta.php
    return request()->meta;
}

function page_element($name)
{
    $element = null;

    if ($name === 'sidebar-menu') {
        $categories = \App\Models\ProductCategory::with('products:id,category_id', 'children:id,name,parent_id', 'children.products')->get();

        $categoryCssClass = [];
        $categories->each(function ($item) use (&$categoryCssClass) {
            if (route('products.categories.show', $item->id) == request()->url()) {
                $categoryCssClass[$item->id] = 'active';
                $categoryCssClass[$item->parent_id] = 'open';
            } else {
                isset($categoryCssClass[$item->id]) ?: $categoryCssClass[$item->id] = '';
            }
        });

        $element = view('public.layouts.includes.sidebar-menu', compact('categories', 'categoryCssClass'))->render();
    }

    return $element;
}
