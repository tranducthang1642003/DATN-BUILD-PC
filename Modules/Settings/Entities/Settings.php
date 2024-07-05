<?php

namespace Modules\Settings\Entities;

use Illuminate\Database\Eloquent\Model;


class Settings extends Model
{
    protected $table = 'Settings';
    protected $fillable = [
        'id',
        'name',
        'images_url',
        'created_at',
        'updated_at',
    ];
}
