<?php

namespace App\Http\Controllers;

use App\Models\Product;

class PageController extends Controller
{
    public function showHomePage()
    {
        $count = config('site.products.home_page_count');
        $products = Product::inRandomOrder()->limit($count)->get();
        return view('public.pages.index', compact('products'));
    }

    public function productSummaryPage()
    {
        return view('public.pages.product_summary');
    }
}
