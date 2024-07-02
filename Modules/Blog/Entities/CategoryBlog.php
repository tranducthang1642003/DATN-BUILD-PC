<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CategoryBlog extends Model
{
    protected $table = 'category_blog';
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];

}
