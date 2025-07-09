<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutContent extends Model
{
    protected $fillable = [
        'title',
        'main_content',
        'features', // JSON veya metin olarak tutulabilir
        'stats',    // JSON veya metin olarak tutulabilir
        'contact',  // JSON veya metin olarak tutulabilir
    ];
} 