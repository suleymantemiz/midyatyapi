<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'main_content',
        'contact_info',
        'working_hours',
        'social_links',
        'map_embed'
    ];

    protected $casts = [
        'contact_info' => 'array',
        'working_hours' => 'array',
        'social_links' => 'array'
    ];
} 