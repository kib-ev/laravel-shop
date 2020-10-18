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

    if ($name === 'sidebar') {
        $seconds = 60 * 60 * 24;
        $element = \Illuminate\Support\Facades\Cache::remember('sidebar', $seconds, function () {
            $categories = \App\Models\ProductCategory::all();
            return view('public.layouts.includes.sidebar', compact('categories'))->render();
        });
    }

    return $element;
}
