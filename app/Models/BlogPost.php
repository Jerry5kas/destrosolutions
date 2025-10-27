<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'title', 'description', 'subcontent', 'image', 'is_active', 'is_featured'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        // subcontent stored as JSON string, no cast to keep it as string
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(BlogPostImage::class, 'blog_post_id')->orderBy('order');
    }
}


