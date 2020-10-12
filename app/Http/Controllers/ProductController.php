<?php

namespace App\Http\Controllers;

use App\Classes\Parser\WebParser;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if (!$product->description) {
            WebParser::updateProductData($product);
        }
//        if(Str::contains('http://1000-stroy.by/', $product->image_path)) {
//            // TODO: save images to local storage
//        }

        meta()->update([
            'title' => $product->name,
        ]);

        $products = $product->category
            ->products()
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->paginate(config('site.products.related_count'));

        return view('public.pages.product_details', compact('product', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
