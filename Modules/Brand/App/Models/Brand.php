<?php

namespace Modules\Brand\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Brand\Database\factories\BrandFactory;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $fillable = [
        'id',
        'name',
        'description',
        'slug',
    ];
    
    protected static function newFactory(): BrandFactory
    {
       
    }
}
