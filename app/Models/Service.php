<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $casts = [
        'key_features' => 'array',
        'is_active' => 'boolean',
    ];

    protected $fillable = [
        'title', 'subtitle', 'description', 'key_features', 'image', 'is_active'
    ];
}


