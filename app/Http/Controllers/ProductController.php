<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SyncProduct;
use App\Services\Parser\Sites\WebParserAgrofilterBy;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function syncProducts()
    {
        $remoteProducts = SyncProduct::limit(10)->get();

        foreach ($remoteProducts as $remoteProduct) {
            $product = Product::firstOrCreate([
                'id' => $remoteProduct->id
            ]);

            $product->name = $remoteProduct->name;

            if ($remoteProduct->group->name) {
                $remoteBrand = ProductCategory::firstOrCreate([
                    'name' => $remoteProduct->group->type
                ]);
                $product->category_id = $remoteBrand->id;
            }

            if ($remoteProduct->brand->name) {
                $brand = Brand::firstOrCreate([
                    'name' => $remoteProduct->brand->name,
                    'slug' => $remoteProduct->brand->slug,
                ]);
                $product->brand_id = $brand->id;
            }

            $product->update();
        }

    }

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
        if (request()->has('update')) {
            $wp = new WebParserAgrofilterBy();
            $content = $wp->getPageContent('/filter/' . $product->id);

        }

        meta()->setTitleIfEmpty($product->name);

        $products = $product->category
            ->products()
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->paginate(config('site.products.related_count'));

        return view('public.pages.product_details', compact('product', 'products'));
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
