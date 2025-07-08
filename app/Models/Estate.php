<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\EstateImage; // Doğru namespace'i düzelt

class Estate extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type',
        'status',
        'name',
        'price',
        'main_image',
        'parcel_number',
        'features',
        'gross_m2',
        'net_m2',
        'open_area_m2',
        'number_of_rooms',
        'building_age',
        'number_of_floors',
        'heating',
        'number_of_bathrooms',
        'kitchen',
        'parking',
        'furnished',
        'usage_status',
        'site_content',
        'site_name',
        'help_tl',
        'available_for_credit',
        'title_deed_status',
        'from_person',
        'exchange'
    ];

    public function gallery()
    {
        return $this->hasMany(EstateImage::class);
    }
}
