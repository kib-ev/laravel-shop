<?php

namespace App\Http\Controllers;

class PageController extends Controller
{

    public function productSummaryPage()
    {
        meta()->update([
            'title' => __('ui.shopping_cart'),
        ]);

        return view('public.pages.product_summary');
    }
}
