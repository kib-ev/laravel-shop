<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Jobs\SendEmailToAdminWhenNewOrderAddedJob;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class OrderController extends Controller
{

    public function store(OrderRequest $request)
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

        $job = new SendEmailToAdminWhenNewOrderAddedJob($order);
        $this->dispatch($job);

        return redirect()->back()->with([
            'order' => $order->load('products'),
            'message' => 'ui._order.success_confirmed',
        ]);
    }

    public function show(Order $order)
    {
        //
    }
}
