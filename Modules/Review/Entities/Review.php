<?php

namespace Modules\Review\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;
use Modules\Auth\Entities\User;

class Review extends Model
{
    protected $fillable = ['product_id', 'user_id', 'rating', 'comment', 'created_at', 'updated_at','active'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    // Thêm phương thức để lấy số sao nếu cần
    public function getStars(): string
    {
        return str_repeat('⭐', $this->rating);
    }
}
