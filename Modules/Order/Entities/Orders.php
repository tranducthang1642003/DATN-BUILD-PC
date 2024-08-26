<?php

namespace Modules\Order\Entities;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\Order_items;
use Modules\Auth\Entities\User;
use Modules\Product\Entities\Product;
class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id', 'order_code', 'full_name', 'phone_number', 'email',
        'address', 'city', 'district', 'total_amount', 'shipping_address',
        'payment_method', 'status'

    ];

    public function items()
    {
        return $this->hasMany(Order_items::class, 'order_id', 'id');
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
