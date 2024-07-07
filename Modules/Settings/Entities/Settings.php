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
        'image_type_id',
    ];
    public function imageType()
    {
        return $this->belongsTo(ImageType::class, 'image_type_id', 'id');
    }

    public function scopeOfType($query, $typeName)
    {
        return $query->whereHas('imageType', function ($q) use ($typeName) {
            $q->where('name', $typeName);
        });
    }
}
