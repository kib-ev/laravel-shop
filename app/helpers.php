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

function meta($value = null)
{
    $locale = app()->getLocale();

    $meta = \App\Models\Meta::where([
        'uri' => request()->path() != '/' ? '/' . request()->path() : '/',
        'lang' => $locale,
    ])->first();

    if(isset($value)) {
         return optional($meta)->$value;
    }

    return $meta ?: \App\Models\Meta::make([
        'title' => null,
        'uri' => '/' . request()->path(),
        'lang' => $locale,
    ]);

    return $result;
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

function get_image_url_by_product_id($productId)
{
    $data = get_remote_product_data($productId);
    if ($data) {
        return $data->image;
    } else {
        return 'https://agrofilter.by/img/no-image.jpg';
    }
}

function get_remote_product_data($productId)
{
    $url = 'https://agrofilter.by/api/products/'. $productId;

    try {
        $json = json_decode(file_get_contents($url), false);
    } catch (Exception $exception) {
        $json = [];
    }

    if ($json->status == 'not_found') {
        $product = \App\Models\Product::find($productId);
        if ($product) {
           $product->delete();
        }

        return null;
    }

    return $json;
}
