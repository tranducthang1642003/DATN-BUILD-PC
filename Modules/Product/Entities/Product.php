<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\ProductImage;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'slug',
        'image',
        'featured',
        'status',
        'description',
        'price',
        'quantity',
        'short_description',
        'view',
        'product_code',
        'color',
        'sale',
        'category_id',
        'brand_id',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    
}
