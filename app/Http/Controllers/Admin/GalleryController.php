<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::ordered()->paginate(12);
        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'images' => ['required', 'array', 'min:1'],
            'images.*' => ['required', 'image', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0']
        ]);

        $data['is_active'] = (bool)($data['is_active'] ?? false);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        // Handle multiple image uploads
        $uploadedImages = [];
        foreach ($request->file('images') as $image) {
            $uploadedImages[] = $image->store('uploads/galleries', 'public');
        }
        $data['images'] = $uploadedImages;

        Gallery::create($data);
        return redirect()->route('admin.galleries.index')->with('status', 'Gallery created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'images' => ['nullable', 'array'],
            'images.*' => ['nullable', 'image', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0']
        ]);

        $data['is_active'] = (bool)($data['is_active'] ?? false);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        // Handle new image uploads
        if ($request->hasFile('images')) {
            $uploadedImages = [];
            foreach ($request->file('images') as $image) {
                $uploadedImages[] = $image->store('uploads/galleries', 'public');
            }
            $data['images'] = $uploadedImages;
        }

        $gallery->update($data);
        return redirect()->route('admin.galleries.index')->with('status', 'Gallery updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        // Delete associated images
        foreach ($gallery->images as $image) {
            Storage::disk('public')->delete($image);
        }
        
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('status', 'Gallery deleted successfully');
    }
}
