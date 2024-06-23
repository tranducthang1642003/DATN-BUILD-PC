<?php

namespace Modules\Auth\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyToken extends Model
{
    use HasFactory;
    protected $fillable = ['token', 'email', 'is_activated'];

    protected $table = 'verifytokens'; // Tên bảng trong cơ sở dữ liệu
}
