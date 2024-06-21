<?php

namespace Modules\Admin\App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'price',
        'quantity',
        'long_description',
        'short_description',
        'view',
        'product_code',
        'discount',
        'color',
        'sale',
        'featured',
        'status',
        'id_category',
        'id_brand',
        'created_at',
        'updated_at',
    ];
    public function brand()
    {
        return $this->belongsTo(Brands::class, 'id_brand');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'product_id');
    }
}
