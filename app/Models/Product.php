<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    use HasFactory;

    protected $guarded = ['id'];

    public function category() {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function getPriceOldAttribute() {
        $price_old = number_format($this->attributes['price_old'], 2, '.', '');
        return $price_old != '0.00' ? $price_old : '';
    }

    public function getPriceAttribute() {
        $price = number_format($this->attributes['price'], 2, '.', '');
        return $price != '0.00' ? $price : '';
    }
}
