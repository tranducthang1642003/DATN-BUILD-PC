<?php

namespace Modules\BuildPC\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;

class ConfigurationItem extends Model
{
    protected $fillable = ['configuration_id', 'product_id', 'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
