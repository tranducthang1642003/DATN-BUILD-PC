<?php

namespace Modules\Settings\Entities;

use Illuminate\Database\Eloquent\Model;

class ImageType extends Model
{
    protected $fillable = ['name'];

    public function settings()
    {
        return $this->hasMany(Settings::class, 'image_type_id', 'id');
    }

}