<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'description',
        'image',
        'social_links',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'social_links' => 'array',
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    // Scope for active team members
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for ordered team members
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }

    // Accessor for social links with defaults
    public function getSocialLinksAttribute($value)
    {
        $defaultLinks = [
            'facebook' => '',
            'instagram' => '',
            'twitter' => '',
            'linkedin' => '',
            'youtube' => '',
            'website' => ''
        ];

        $links = json_decode($value, true) ?? [];
        return array_merge($defaultLinks, $links);
    }
}
