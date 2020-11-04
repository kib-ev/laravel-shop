<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function setTitleIfEmpty($title) {
        meta()->firstOrCreate([
            'uri' => request()->getRequestUri(),
            'lang' => app()->getLocale(),
        ], [
            'title' => $title,
        ]);
    }
}
