<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $table = 'training';

    protected $casts = [
        'objectives' => 'array',
        'is_active' => 'boolean',
    ];

    protected $fillable = [
        'title', 'subtitle', 'description', 'objectives', 'image', 'is_active'
    ];
}


