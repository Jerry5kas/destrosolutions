<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::latest()->paginate(12);
        return view('admin.blog.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blog.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['slug'] = Str::slug($data['name']);
        $data['is_active'] = (bool)($data['is_active'] ?? false);
        BlogCategory::create($data);
        return redirect()->route('admin.blog.categories.index')->with('status', 'Created');
    }

    public function edit(BlogCategory $category)
    {
        return view('admin.blog.categories.edit', compact('category'));
    }

    public function update(Request $request, BlogCategory $category)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['slug'] = Str::slug($data['name']);
        $data['is_active'] = (bool)($data['is_active'] ?? false);
        $category->update($data);
        return redirect()->route('admin.blog.categories.index')->with('status', 'Updated');
    }

    public function destroy(BlogCategory $category)
    {
        $category->delete();
        return redirect()->route('admin.blog.categories.index')->with('status', 'Deleted');
    }
}


