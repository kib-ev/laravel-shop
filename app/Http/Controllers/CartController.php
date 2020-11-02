<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cart;

    public function __construct()
    {
        $this->middleware('redirect');
        $this->cart = Cart::getFromSession();
    }

    public function show() {
        meta()->update([
            'title' => __('ui.shopping_cart'),
        ]);

        return view('public.pages.product_summary');
    }

    public function addProduct(Request $request, $productId) // api method
    {
        $product = Product::findOrFail($productId);
        $discount = 0.00;

        $existsProduct = $this->cart->products()->find($productId);
        if ($existsProduct) { // update exists product id
            $existsProductPivot = $existsProduct->pivot;
            $existsProductPivot->update([
                'count' => $existsProductPivot->count + ($request->get('count') ?? 1)
            ]);
        } else {
            $this->cart->products()->attach($product, [
                'count' => $request->get('count') ?? 1,
                'price' => $product->price,
                'discount' => $discount,
                'tax' => ($product->price - $discount) * 0.00 // TODO tax
            ]);
        }

        return $this->cart;
    }

    public function removeProduct(Request $request, $pivotId) // api method
    {
        $this->cart->products()->wherePivot('id', $pivotId)->detach();
        return $this->cart;
    }

    public function updateProduct(Request $request, $pivotId) // api method
    {
        $product = $this->cart->products()->wherePivot('id', $pivotId)->first();

        if ($request->get('count') == 0 || $request->get('count') < 0) {
            return $this->cart;
        }

        $product->pivot->count = $request->get('count') ?? $product->pivot->count;
        $product->pivot->save();

        return $this->cart;
    }
}
