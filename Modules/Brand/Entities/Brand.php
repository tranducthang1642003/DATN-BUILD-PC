<?php

namespace Modules\Brand\Entities;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'brands';
    protected $fillable = [
        'brand_name', 'featured', 'status', 'slug', 'description',
    ];
}
