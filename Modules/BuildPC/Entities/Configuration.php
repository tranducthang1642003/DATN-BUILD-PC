<?php

namespace Modules\BuildPC\Entities;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $fillable = ['user_id', 'name', 'total_price'];

    public function items()
    {
        return $this->hasMany(ConfigurationItem::class);
    }
}
