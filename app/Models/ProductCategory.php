<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model {

    use HasFactory;

    public function products($deep = 1) {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function childrenCategories($deep = 1) {
        return $this->hasMany(ProductCategory::class, 'parent_id', 'id');
    }
}
