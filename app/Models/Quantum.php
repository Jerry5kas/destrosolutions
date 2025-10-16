<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantum extends Model
{
    use HasFactory;

    protected $table = 'quantum';

    protected $casts = [
        'key_features' => 'array',
        'is_active' => 'boolean',
    ];

    protected $fillable = [
        'title', 'description', 'key_features', 'image', 'is_active'
    ];
}


