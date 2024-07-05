<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;

class ProductImage extends Model
{
    protected $table = 'product_images';
    protected $fillable = [
        'product_id',
        'image_path',
        'is_primary',
    ];
    public function images()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
