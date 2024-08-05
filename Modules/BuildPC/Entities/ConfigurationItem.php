<?php

namespace Modules\BuildPC\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;
use Modules\BuildPC\Entities\Configuration;

class ConfigurationItem extends Model
{
    protected $fillable = ['configuration_id', 'product_id', 'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function configuration()
    {
        return $this->belongsTo(Configuration::class);
    }
}
