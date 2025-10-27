<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\BlogPostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::latest()->with(['category', 'images'])->paginate(12);
        return view('admin.blog.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = BlogCategory::where('is_active', true)->orderBy('name')->get();
        return view('admin.blog.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => ['required','exists:blog_categories,id'],
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'subcontent' => ['nullable','json'],
            'image' => ['nullable','image'],
            'is_active' => ['nullable','boolean'],
            'is_featured' => ['nullable','boolean'],
            'gallery_images.*' => ['nullable','image'],
            'gallery_alt.*' => ['nullable','string','max:255'],
        ]);
        
        $data['is_active'] = (bool)($data['is_active'] ?? false);
        $data['is_featured'] = (bool)($data['is_featured'] ?? false);
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/blog', 'public');
        }
        
        $post = BlogPost::create($data);
        
        // Handle gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $index => $image) {
                $path = $image->store('uploads/blog/gallery', 'public');
                BlogPostImage::create([
                    'blog_post_id' => $post->id,
                    'image' => $path,
                    'alt' => $request->gallery_alt[$index] ?? null,
                    'order' => $index,
                ]);
            }
        }
        
        return redirect()->route('admin.blog.posts.index')->with('status', 'Created');
    }

    public function edit(BlogPost $post)
    {
        $categories = BlogCategory::where('is_active', true)->orderBy('name')->get();
        $post->load('images');
        return view('admin.blog.posts.edit', compact('post','categories'));
    }

    public function update(Request $request, BlogPost $post)
    {
        $data = $request->validate([
            'category_id' => ['required','exists:blog_categories,id'],
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'subcontent' => ['nullable','json'],
            'image' => ['nullable','image'],
            'is_active' => ['nullable','boolean'],
            'is_featured' => ['nullable','boolean'],
            'gallery_images.*' => ['nullable','image'],
            'gallery_alt.*' => ['nullable','string','max:255'],
        ]);
        
        $data['is_active'] = (bool)($data['is_active'] ?? false);
        $data['is_featured'] = (bool)($data['is_featured'] ?? false);
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/blog', 'public');
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $path;
        }
        
        $post->update($data);
        
        // Handle gallery images
        if ($request->hasFile('gallery_images')) {
            $existingCount = $post->images()->count();
            foreach ($request->file('gallery_images') as $index => $image) {
                $path = $image->store('uploads/blog/gallery', 'public');
                BlogPostImage::create([
                    'blog_post_id' => $post->id,
                    'image' => $path,
                    'alt' => $request->gallery_alt[$index] ?? null,
                    'order' => $existingCount + $index,
                ]);
            }
        }
        
        return redirect()->route('admin.blog.posts.index')->with('status', 'Updated');
    }

    public function destroy(BlogPost $post)
    {
        $post->load('images');
        
        // Delete gallery images
        foreach ($post->images as $image) {
            if (Storage::disk('public')->exists($image->image)) {
                Storage::disk('public')->delete($image->image);
            }
        }
        
        // Delete feature image
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }
        
        $post->delete();
        return redirect()->route('admin.blog.posts.index')->with('status', 'Deleted');
    }
}


