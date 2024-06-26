<?php

namespace Modules\Admin\App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $fillable = [
        'id',
        'brand_name',
        'description',
        'slug',
        'feature',
        'status',
    ];
}
