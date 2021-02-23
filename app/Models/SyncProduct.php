<?php

namespace App\Models;

use App\Models\Pivots\GroupProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class SyncProduct extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $metaTitle;

    protected $connection = 'AGRO_Filter_by';
    protected $table = 'filters';

    public function group()
    {
        return $this->belongsTo(SyncGroup::class, 'group_name', 'name');
    }

    public function brand()
    {
        return $this->belongsTo(SyncBrand::class, 'brand_id');
    }

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
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
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

    public function getDescriptionAttribute()
    {
        $description = $this->attributes['description'];
        $cleanDescription = $this->temp_clearDescription($description);

        $this->description = $cleanDescription;
        $this->update();

        return $cleanDescription;
    }

    protected function temp_clearDescription($description) // TODO remove this method
    {
        // remove links from content
        $desc = preg_replace('#<a.*?>(.*?)</a>#i', '\1', $description);
        $desc = preg_replace('#<iframe.*?>(.*?)</iframe>#i', '\1', $desc);

        $desc = str_replace([
            '<div class="s-res-video"></div>',
        ], '<p></p>', $desc);

        if (Storage::disk('public')->exists('remove-list.txt')) {
            $content = Storage::disk('public')->get('remove-list.txt');
            $replace = explode(PHP_EOL, $content);
            $desc = str_replace($replace, '', $desc);
        }

        return $desc;
    }
}
