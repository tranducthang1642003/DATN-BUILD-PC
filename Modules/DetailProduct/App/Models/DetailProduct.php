<?php

namespace Modules\DetailProduct\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\DetailProduct\Database\factories\DetailProductFactory;

class DetailProduct extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): DetailProductFactory
    {
        //return DetailProductFactory::new();
    }
}
