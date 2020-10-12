<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function products()
    {
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
}
