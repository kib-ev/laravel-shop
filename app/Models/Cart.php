<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id'];

    public $summary_price = 0.00;
    public $summary_discount = 0.00;
    public $summary_tax = 0.00;
    public $summary_total = 0.00;

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
            if (!$cart) {
                $cart = Cart::createNewCartAndPutInSession();
            }
        } else {
            $cart = Cart::createNewCartAndPutInSession();
        }
        $cart->updateSummary();
        return $cart;
    }

    protected static function createNewCartAndPutInSession() {
        $cart = Cart::create();
        session()->put('cart_id', $cart->id);

        return $cart;
    }

    public function updateSummary() {
        foreach ($this->products as $product) {
            $product->pivot->summary_price = $product->pivot->price * $product->pivot->count;
            $product->pivot->summary_discount = $product->pivot->discount * $product->pivot->count;
            $product->pivot->summary_tax = $product->pivot->tax * $product->pivot->count;
            $product->pivot->summary_total = ($product->pivot->price - $product->pivot->discount + $product->pivot->tax)
                * $product->pivot->count;

            $this->summary_price += $product->pivot->summary_price;
            $this->summary_discount += $product->pivot->summary_discount;
            $this->summary_tax += $product->pivot->summary_tax;
            $this->summary_total += $product->pivot->summary_total;
        }
    }

    public function isEmpty()
    {
       return $this->products->count() == 0;
    }

    public function isNotEmpty()
    {
        return ! $this->isEmpty();
    }

}
