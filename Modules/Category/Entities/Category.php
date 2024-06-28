<?php

namespace Modules\Category\Entities;

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
}
