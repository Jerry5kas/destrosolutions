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
        $categories = BlogCategory::withCount('posts')->latest()->paginate(12);
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
            'description' => ['nullable','string'],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['slug'] = $this->generateUniqueSlug($data['name']);
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
            'description' => ['nullable','string'],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['slug'] = $this->generateUniqueSlug($data['name'], $category->id);
        $data['is_active'] = (bool)($data['is_active'] ?? false);
        $category->update($data);
        return redirect()->route('admin.blog.categories.index')->with('status', 'Updated');
    }

    public function destroy(BlogCategory $category)
    {
        $category->delete();
        return redirect()->route('admin.blog.categories.index')->with('status', 'Deleted');
    }

    private function generateUniqueSlug(string $name, $excludeId = null): string
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $counter = 1;

        while (true) {
            $query = BlogCategory::where('slug', $slug);
            if ($excludeId) {
                $query->where('id', '!=', $excludeId);
            }
            
            if (!$query->exists()) {
                break;
            }
            
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}


