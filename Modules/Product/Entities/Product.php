<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\ProductImage;
use Modules\Brand\Entities\Brand;
use Modules\Category\Entities\Category;
use Modules\Cart\Entities\CartItem;
use Modules\Like\Entities\wishlists;
use Modules\Product\Entities\Promotion;
use Modules\Review\Entities\Review;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'slug',
        'price',
        'quantity',
        'description',
        'specifications',
        'view',
        'product_code',
        'sale',
        'price_sale',
        'color',
        'featured',
        'status',
        'category_id',
        'brand_id',
        'stock',
        'price_sale',
        'created_at',
        'updated_at',
    ];

    public function promotions()
    {
        return $this->belongsToMany(Promotion::class, 'product_promotions');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }


    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }


    public function cart()
    {
        return $this->hasMany(CartItem::class);
    }
    public function isLikedBy($user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function likes()
    {
        return $this->hasMany(Wishlists::class);
    }


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getDiscountPercentageAttribute()
    {
        if ($this->price <= 0) {
            return 0;
        }

        $discountAmount = $this->price - $this->price_sale;
        $discountPercentage = ($discountAmount / $this->price) * 100;

        return round($discountPercentage, 2); // Round to 2 decimal places
    }
}
