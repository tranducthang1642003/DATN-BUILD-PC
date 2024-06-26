<?php

namespace Modules\Admin\App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    use HasFactory;
    protected $table = 'promotions';
    protected $fillable = [
        'id',
        'promotion_code',
        'description',
        'discount',
        'start_date',
        'end_date',
    ];
}
