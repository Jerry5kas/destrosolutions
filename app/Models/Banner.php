<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 'title', 'slogan', 'description', 'page', 'text1', 'text2', 'text3', 'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}


