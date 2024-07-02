<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\User;

class Blogs extends Model
{
    protected $table = 'blogs';
    protected $fillable = [
        'title',
        'slug',
        'content',
        'user_id',
        'category_blog_id',
        'created_at',
        'updated_at',
    ];

    
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category_blog()
    {
        return $this->belongsTo(CategoryBlog::class, 'category_blog_id');
    }

}
