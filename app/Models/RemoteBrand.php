<?php

namespace App\Models;

use App\Models\Pivots\GroupProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class RemoteBrand extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $connection = 'AGRO_Filter_by';
    protected $table = 'brands';

}
