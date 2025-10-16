<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::latest()->with('category')->paginate(12);
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
            'image' => ['nullable','image'],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['is_active'] = (bool)($data['is_active'] ?? false);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/blog', 'public');
        }
        BlogPost::create($data);
        return redirect()->route('admin.blog.posts.index')->with('status', 'Created');
    }

    public function edit(BlogPost $post)
    {
        $categories = BlogCategory::where('is_active', true)->orderBy('name')->get();
        return view('admin.blog.posts.edit', compact('post','categories'));
    }

    public function update(Request $request, BlogPost $post)
    {
        $data = $request->validate([
            'category_id' => ['required','exists:blog_categories,id'],
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'image' => ['nullable','image'],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['is_active'] = (bool)($data['is_active'] ?? false);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/blog', 'public');
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $path;
        }
        $post->update($data);
        return redirect()->route('admin.blog.posts.index')->with('status', 'Updated');
    }

    public function destroy(BlogPost $post)
    {
        $post->delete();
        return redirect()->route('admin.blog.posts.index')->with('status', 'Deleted');
    }
}


