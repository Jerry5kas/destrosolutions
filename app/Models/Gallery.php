<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'description',
        'images',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'images' => 'array',
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    // Scope for active galleries
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for ordered galleries
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }
}
