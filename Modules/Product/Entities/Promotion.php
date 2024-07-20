<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = ['promotion_code', 'description', 'discount', 'start_date', 'end_date'];
}

class ProductPromotion extends Model
{
    protected $table = 'product_promotions';
    protected $fillable = ['product_id', 'promotion_id'];
    public $timestamps = false;
}
