<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstateImage extends Model
{
    protected $fillable = [
        'estate_id', 'image'
    ];
}
