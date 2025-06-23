<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estate extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type', 'status', 'name', 'price', 'main_image', 'parcel_number', 'features'
    ];
}