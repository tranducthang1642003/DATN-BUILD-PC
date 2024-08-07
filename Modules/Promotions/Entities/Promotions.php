<?php

namespace Modules\Promotions\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;

class Promotions extends Model
{
    use HasFactory;
    protected $table = 'promotions';
    protected $fillable = [
        'id',
        'promotion_code',
        'description',
        'discount',
        'product_id',
        'all',
        'start_date',
        'end_date',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
