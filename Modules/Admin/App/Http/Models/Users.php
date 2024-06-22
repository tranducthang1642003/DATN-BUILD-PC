<?php

namespace Modules\Admin\App\Http\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'address',
        'name',
        'remember_token',
     
    ];
}
