<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class OrderController extends Controller
{

    public function store(Request $request)
    {
        $cart = cart();

        $data = array(
            'user_id' => auth()->id(),
            'cart_id' => $cart->id
        );

        $order = Order::create(array_merge($data, $request->all()));

        foreach ($cart->products as $product) {
            $order->products()->attach($product, [
                'count' => $product->pivot->count,
                'price' => $product->pivot->price,
                'discount' => $product->pivot->discount,
                'tax' => $product->pivot->tax,
            ]);
        }

        $cart->delete();

        return back()->with([
            'order' => $order->load('products'),
            'message' => 'success',
        ]);
    }

    public function show(Order $order)
    {
        //
    }
}
