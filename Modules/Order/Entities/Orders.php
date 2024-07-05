<?php

namespace Modules\Order\Entities;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\Order_items;

class Orders extends Model
{
    protected $table = 'orders';
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(Order_items::class, 'order_id', 'id');
    }
}
