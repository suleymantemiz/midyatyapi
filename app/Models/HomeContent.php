<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_button_text',
        'hero_button_url',
        'about_title',
        'about_content',
        'about_features',
        'statistics',
        'home_services_title',
        'home_services_subtitle',
        'home_services',
        'featured_title',
        'featured_subtitle',
        'testimonials_title',
        'testimonials_subtitle',
        'testimonials',
        'cta_title',
        'cta_content',
        'cta_button_text',
        'cta_button_url',
    ];

    protected $casts = [
        'about_features' => 'array',
        'statistics' => 'array',
        'home_services' => 'array',
        'testimonials' => 'array',
    ];
} 