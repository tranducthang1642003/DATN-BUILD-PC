<?php

namespace Modules\Admin\App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

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
        return $this->belongsTo(Brands::class, 'brand_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

   
    
   
   
}
