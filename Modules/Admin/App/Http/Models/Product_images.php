<?php

namespace Modules\Admin\App\Http\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_images extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "id_primary",
        'image_path',
        "product_id",
    ];
    public function images()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
