<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstateImage extends Model
{
    protected $fillable = [
        'estate_id', 'image_path'
    ];

    // image_path alanını image olarak erişmek için accessor
    public function getImageAttribute()
    {
        return $this->image_path;
    }

    // image alanını image_path olarak kaydetmek için mutator
    public function setImageAttribute($value)
    {
        $this->attributes['image_path'] = $value;
    }
}
