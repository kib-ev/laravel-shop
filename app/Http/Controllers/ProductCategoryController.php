<?php

namespace App\Http\Controllers;

use App\Classes\Parser\WebParserPostroykaBy;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param int $productCategoryId
     * @return \Illuminate\Http\Response
     */
    public function show($productCategoryId)
    {
        $productCategory = ProductCategory::with('products')->findOrFail($productCategoryId);

        if (!$productCategory->hasChildren() && $productCategory->products()->count() == 0) {

            $webParser = new WebParserPostroykaBy();
            $url = $webParser->site.$productCategory->parser_link;

            $products = $webParser->parseProductsFromSingleCategoryPage($url, $productCategoryId);

            $products->each(function ($item) {
                $item->save();
            });
        }

        meta()->update([
            'title' => $productCategory->name,
        ]);

        return view('public.pages.products', [
            'category' => $productCategory,
            'products' => $productCategory->products()->paginate(config('site.products.per_page')),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        //
    }
}
