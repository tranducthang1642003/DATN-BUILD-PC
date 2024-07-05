<?php

namespace Modules\Order\Entities;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    protected $table = 'order_items';
    protected $guarded = [];
    
    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id', 'id');
    }
}
