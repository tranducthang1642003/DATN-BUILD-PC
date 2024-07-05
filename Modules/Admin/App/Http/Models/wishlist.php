<?php

namespace Modules\Admin\App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlists extends Model
{
    use HasFactory;
    protected $table = 'promotions';
    protected $fillable = [
        'id',
        'product_id',
        'start_date',
        'end_date',
    ];
    public function wishlists()
    {
        return $this->belongsTo(wishlists::class, 'wishlists_id');
    }
}
