<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\ProductImage;

use Modules\Brand\Entities\Brand;
use Modules\Category\Entities\Category;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'slug',
        'price',
        'quantity',
        'description',
        'specifications',
        'view',
        'product_code',
        'sale',
        'color',
        'featured',
        'status',
        'category_id',
        'brand_id', 
        'stock', 
        'created_at',
        'updated_at',
    ];

    
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }

    public function additionalImages()
    {
        return $this->hasMany(ProductImage::class)->where('is_primary', false);
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
