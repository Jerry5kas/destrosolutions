<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    public function index()
    {
        $training = Training::latest()->paginate(12);
        return view('admin.training.index', compact('training'));
    }

    public function create()
    {
        return view('admin.training.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'objectives' => ['nullable','array'],
            'image' => ['nullable','image'],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['is_active'] = (bool)($data['is_active'] ?? false);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/training', 'public');
        }
        Training::create($data);
        return redirect()->route('admin.training.index')->with('status', 'Created');
    }

    public function edit(Training $training)
    {
        return view('admin.training.edit', compact('training'));
    }

    public function update(Request $request, Training $training)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'objectives' => ['nullable','array'],
            'image' => ['nullable','image'],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['is_active'] = (bool)($data['is_active'] ?? false);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/training', 'public');
            if ($training->image && Storage::disk('public')->exists($training->image)) {
                Storage::disk('public')->delete($training->image);
            }
            $data['image'] = $path;
        }
        $training->update($data);
        return redirect()->route('admin.training.index')->with('status', 'Updated');
    }

    public function destroy(Training $training)
    {
        $training->delete();
        return redirect()->route('admin.training.index')->with('status', 'Deleted');
    }

}


