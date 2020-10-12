<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;

    // use HasMeta; // TODO

    protected $guarded = ['id'];
    protected $metaTitle;

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', 1);
    }

    public function scopeDiscounted($query, $filter = 0)
    {
        switch ($filter) {
            case 1 :
                return $query->where('price_old', '!=', 0);
            default :
                return $query;
        }
    }

    public function scopeSearch($query, $search = null)
    {
        if ($search) {
            return $query->where('name', 'like', '%' . $search . '%');
        }
    }

    public function getPriceOldAttribute()
    {
        $price_old = number_format($this->attributes['price_old'], 2, '.', '');
        return $price_old != '0.00' ? $price_old : '';
    }

    public function getPriceAttribute()
    {
        $price = number_format($this->attributes['price'], 2, '.', '');
        return $price != '0.00' ? $price : '';
    }

    public function setMetaTitleAttribute($value)
    {
        $meta = Meta::where([
            'uri' => request()->getRequestUri(),
            'lang' => app()->getLocale(),
        ])->first();

        $meta->title = $value;
        $meta->update();

        $this->metaTitle = $value;
    }
}
