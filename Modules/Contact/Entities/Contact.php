<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts'; // Specify the table name if different from the model name (optional)

    protected $fillable = [
        'name', // Ensure these fields match your database table columns
        'email',
        'message',
    ];

    // You can also define relationships or additional methods as needed
}

