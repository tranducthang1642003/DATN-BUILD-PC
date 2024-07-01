<?php

namespace Modules\Category\Entities;
use Modules\Product\Entities\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'categories';
    protected $fillable = [
        'category_name', 'slug', 'image', 'featured', 'status', 'description',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
