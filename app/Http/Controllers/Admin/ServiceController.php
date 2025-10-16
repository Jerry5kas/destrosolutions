<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(12);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'key_features' => ['nullable','string'],
            'image' => ['nullable','image'],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['key_features'] = $this->linesToArray($data['key_features'] ?? '');
        $data['is_active'] = (bool)($data['is_active'] ?? false);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/services', 'public');
        }
        Service::create($data);
        return redirect()->route('admin.services.index')->with('status', 'Created');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'key_features' => ['nullable','string'],
            'image' => ['nullable','image'],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['key_features'] = $this->linesToArray($data['key_features'] ?? '');
        $data['is_active'] = (bool)($data['is_active'] ?? false);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/services', 'public');
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $path;
        }
        $service->update($data);
        return redirect()->route('admin.services.index')->with('status', 'Updated');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('status', 'Deleted');
    }

    private function linesToArray(string $text): array
    {
        return collect(preg_split("/(\r\n|\r|\n)/", trim($text)))->filter()->values()->all();
    }
}


