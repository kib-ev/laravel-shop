<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(int $productCategoryId)
    {
        $productCategory = ProductCategory::with('products')->findOrFail($productCategoryId);

        meta()->update([
            'title' => $productCategory->name,
        ]);

        $productsIds = $productCategory->products->pluck('id');
        foreach($productCategory->children as $childrenCategory) {
             $productsIds = $productsIds->merge($childrenCategory->products->pluck('id'));
        }
        $products = Product::whereIn('id', $productsIds)->paginate(config('site.products.per_page'));

        return view('public.pages.products', [
            'category' => $productCategory,
            'products' => $products,
        ]);
    }

    public function edit(ProductCategory $productCategory)
    {
        //
    }

    public function update(Request $request, ProductCategory $productCategory)
    {
        //
    }

    public function destroy(ProductCategory $productCategory)
    {
        //
    }
}
