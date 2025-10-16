<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->paginate(12);
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'slogan' => ['nullable','string','max:255'],
            'description' => ['nullable','string'],
            'page' => ['required','string','max:255'],
            'text1' => ['nullable','string','max:255'],
            'text2' => ['nullable','string','max:255'],
            'text3' => ['nullable','string','max:255'],
            'is_active' => ['nullable','boolean'],
            'image' => ['nullable','image'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/banners', 'public');
        }

        $data['is_active'] = (bool)($data['is_active'] ?? false);

        Banner::create($data);

        return redirect()->route('admin.banners.index')->with('status', 'Banner created');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'slogan' => ['nullable','string','max:255'],
            'description' => ['nullable','string'],
            'page' => ['required','string','max:255'],
            'text1' => ['nullable','string','max:255'],
            'text2' => ['nullable','string','max:255'],
            'text3' => ['nullable','string','max:255'],
            'is_active' => ['nullable','boolean'],
            'image' => ['nullable','image'],
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/banners', 'public');
            if ($banner->image && Storage::disk('public')->exists($banner->image)) {
                Storage::disk('public')->delete($banner->image);
            }
            $data['image'] = $path;
        }

        $data['is_active'] = (bool)($data['is_active'] ?? false);

        $banner->update($data);

        return redirect()->route('admin.banners.index')->with('status', 'Banner updated');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->image && Storage::disk('public')->exists($banner->image)) {
            Storage::disk('public')->delete($banner->image);
        }
        $banner->delete();
        return redirect()->route('admin.banners.index')->with('status', 'Banner deleted');
    }
}


