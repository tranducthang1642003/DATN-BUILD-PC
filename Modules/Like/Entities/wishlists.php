<?php

namespace Modules\Like\Entities;


use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;
use Modules\Auth\Entities\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class wishlists extends Model
{
    protected $fillable = ['user_id', 'product_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
