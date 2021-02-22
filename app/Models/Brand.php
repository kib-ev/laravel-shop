<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function parent()
    {
        return $this->hasOne($this->getMorphClass(), 'id', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany($this->getMorphClass(), 'parent_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
