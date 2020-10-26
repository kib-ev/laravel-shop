<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id', 'id');
    }

    public function parentCategory() {
        return $this->belongsTo(ProductCategory::class, 'parent_id', 'id');
    }

    public function hasChildren()
    {
        return $this->children->count();
    }

    public function productsCount($deep = 1)
    {
        $ownProductsCount = $this->products->count();

        if ($deep == 0) {
            $childrenCatProductsCount = $this->children->sum(function ($item) {
                return $item->products->count();
            });
            return $ownProductsCount + $childrenCatProductsCount;
        }

        return $ownProductsCount;
    }
}
