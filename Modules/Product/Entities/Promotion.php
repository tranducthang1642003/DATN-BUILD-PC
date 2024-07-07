<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;

class Promotion extends Model
{
    protected $table = 'promotions';
    protected $fillable = [
        'promotion_code', 'description', 'discount', 'start_date', 'end_date'

    ];
    protected $dates = [
        'start_date', 'end_date'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_promotions');
    }
}
