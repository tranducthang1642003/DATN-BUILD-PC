<?php

namespace Modules\Settings\Entities;

use Illuminate\Database\Eloquent\Model;


class Menu extends Model
{
    protected $table = 'Settings';
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];
}
