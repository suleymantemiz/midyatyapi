<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'main_content',
        'services',
        'process_steps',
        'pricing_plans'
    ];

    protected $casts = [
        'services' => 'array',
        'process_steps' => 'array',
        'pricing_plans' => 'array'
    ];
} 