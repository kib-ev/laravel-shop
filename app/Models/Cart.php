<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot([
            'id',
            'count',
            'price',
            'discount',
            'tax',
            'created_at',
            'updated_at'
        ]);
    }

    public static function getFromSession() {
        if(session()->has('cart_id')) {
            $cart = Cart::with('products')->find(session()->get('cart_id'));
            $cart->addSummary();
        } else {
            $cart = Cart::create();
            session()->put('cart_id', $cart->id);
        }
        return $cart;
    }

    public function addSummary() {
        foreach ($this->products as $product) {
            $product->summary_price = $product->pivot->price * $product->pivot->count;
            $product->summary_discount = $product->pivot->discount * $product->pivot->count;
            $product->summary_tax = $product->pivot->tax * $product->pivot->count;
            $product->summary_total = ($product->pivot->price - $product->pivot->discount + $product->pivot->tax)
                * $product->pivot->count;

            $this->summary_price += $product->summary_price;
            $this->summary_discount += $product->summary_discount;
            $this->summary_tax += $product->summary_tax;
            $this->summary_total += $product->summary_total;
        }
    }

    public function getSummaryTotalAttribute() {
        $value = $this->attributes['summary_total'] ?? 0;
        return number_format($value, 2, '.', '');
    }

}
