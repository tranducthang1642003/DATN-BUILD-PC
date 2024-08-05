<?php

namespace Modules\BuildPC\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\User;

class Configuration extends Model
{
    protected $fillable = ['user_id', 'name', 'total_price'];

    public function items()
    {
        return $this->hasMany(ConfigurationItem::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
