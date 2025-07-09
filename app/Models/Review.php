<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'estate_id',
        'name',
        'email',
        'comment',
        'rating',
        'is_approved'
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'rating' => 'integer'
    ];

    public function estate()
    {
        return $this->belongsTo(Estate::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }
} 