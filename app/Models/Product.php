<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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

    public function getDescriptionAttribute() {
        $description = $this->attributes['description'];
        $cleanDescription = $this->temp_clearDescription($description);

        $this->description = $cleanDescription;
        $this->update();

        return $cleanDescription;
    }

    protected function temp_clearDescription($description) {
        // remove links from content
        $desc = preg_replace('#<a.*?>(.*?)</a>#i', '\1', $description);
        $desc = preg_replace('#<iframe.*?>(.*?)</iframe>#i', '\1', $desc);

        $desc = str_replace([
            '<div class="s-res-video"></div>',
        ], '<p></p>', $desc);

        $replace = [
            '<div class="text_blk"><p>Малярный инструмент для строительных работ в каталоге "Постройка.бай".</p></div>',
            '<div class="text_blk"><p>Сварная сетка и арматура в каталоге "Постройка.бай".</p></div>',
            '<p>Керамзитобетонные блоки для строительных работ в каталоге "Постройка.бай".</p>',
            '<p>Сварная сетка и арматура в каталоге "Постройка.бай".</p>',
            '<h5>Видео: секреты и особенности работы с утеплителями</h5>',
            '<div class="s-res-video">&gt;</div>',
            '<div class="s-res-video">></div>',
            '<div class="text_blk"><h5>Видео: секреты и особенности работы с OSB</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты и особенности работы со стеклохолстом</h5><p></p></div>',
            '<p>Газосиликатные блоки для строительных работ в каталоге "Постройка.бел".</p>',
            '<div class="text_blk"><p>Шпатлёвочные сетки для строительных работ в каталоге "Постройка.бай".</p></div>',
            '<div class="text_blk">Видео: секреты и особенности работы с битумными материалами<p></p></div>',
            '<div class="text_blk">Видео: секреты и особенности работы с утеплителями<p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты и особенности работы с декоративной штукатуркой</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты работы с утеплителями</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты и особенности кладка блока и кирпича</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты работы со шпаклевкой</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео о прочности ГВЛ</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты и особенности работы с цементом</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты работы со штукатуркой</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты и особенности работы с зонтами для утепления</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты и особенности работы с цокольной планкой</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты и особенности работы с гипсокартоном</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты и особенности работы с сетками и лентами</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты и особенности работы с углами</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты и особенности работы с монтажной пеной</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты и особенности работы с клеем для плитки</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты и особенности работы с грунтовкой</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты и особенности работы с фугой</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты и особенности работы с красками</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты и особенности работы с клеем для утеплителя</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты и особенности работы с битумными материалами</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты и особенности работы с маяками</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты и особенности работы с мембранами и плёнками</h5><p></p></div>',
            '<div class="text_blk"><h5>Видео: секреты и особенности работы с профилем для гипсокартона</h5><p></p></div>',
        ];

        $desc = str_replace($replace, '', $desc);

        return $desc;
    }
}
