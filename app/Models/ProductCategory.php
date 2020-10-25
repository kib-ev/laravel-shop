<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{

    use HasFactory;

    protected $guarded = ['id'];

    public function products($deep = 1)
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function childrenCategories($deep = 1)
    {
        return $this->hasMany(ProductCategory::class, 'parent_id', 'id');
    }

    public function parentCategory() {
        return $this->belongsTo(ProductCategory::class, 'parent_id', 'id');
    }

    public function hasChildren()
    {
        return $this->childrenCategories->count();
    }

    public function productsCount($deep = 1)
    {
        $ownProductsCount = $this->products->count();

        if ($deep == 0) {
            $childrenCatProductsCount = $this->childrenCategories->sum(function ($item) {
                return $item->products->count();
            });
            return $ownProductsCount + $childrenCatProductsCount;
        }

        return $ownProductsCount;
    }
}
