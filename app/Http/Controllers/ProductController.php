<?php

namespace App\Http\Controllers;

use App\Jobs\SyncProductsJob;
use App\Models\Product;
use App\Services\Parser\Sites\WebParserAgrofilterBy;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function syncProducts()
    {
        dd(Product::count());
    }

    public function index(Request $request)
    {
        $discounted = (boolean)$request->get('only_discounted');
        $search = $request->get('search');

        $products = Product::with(['category', 'brand'])->discounted($discounted)
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
        if (request()->has('update')) {
            $wp = new WebParserAgrofilterBy();
            $content = $wp->getPageContent('/filter/' . $product->id);

        }

        $product->_remote = get_remote_product_data($product->id);

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
