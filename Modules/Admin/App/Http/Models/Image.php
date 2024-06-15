<?php

namespace Modules\Admin\App\Http\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'url_image',
        "id",
        "product_id",
    ];
}
