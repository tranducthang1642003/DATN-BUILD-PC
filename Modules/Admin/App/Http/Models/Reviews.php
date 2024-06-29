<?php

namespace Modules\Admin\App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $table = 'promotions';
    protected $fillable = [
        'id',
        'rating',
        'comment',
        'product_id',
        'start_date',
        'end_date',
    ];
    public function reviews()
    {
        return $this->belongsTo(Product::class, 'reviews_id');
    }
}
