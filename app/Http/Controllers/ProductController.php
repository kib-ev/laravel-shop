<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $discounted = (boolean)$request->get('only_discounted');
        $search = $request->get('search');

        $products = Product::discounted($discounted)
            ->search($search)
            ->paginate(config('site.products.per_page'));

        meta()->update([
            'title' => __('ui.products'),
        ]);

        return view('public.pages.products', compact('products'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Product $product)
    {
        meta()->setTitleIfEmpty($product->name);

        $products = $product->category
            ->products()
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->paginate(config('site.products.related_count'));

        return view('public.pages.product', compact('product', 'products'));
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
