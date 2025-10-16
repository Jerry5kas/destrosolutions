<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quantum;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class QuantumController extends Controller
{
    public function index()
    {
        $quantum = Quantum::latest()->paginate(12);
        return view('admin.quantum.index', compact('quantum'));
    }

    public function create()
    {
        return view('admin.quantum.create');
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
            $data['image'] = $request->file('image')->store('uploads/quantum', 'public');
        }
        Quantum::create($data);
        return redirect()->route('admin.quantum.index')->with('status', 'Created');
    }

    public function edit(Quantum $quantum)
    {
        return view('admin.quantum.edit', compact('quantum'));
    }

    public function update(Request $request, Quantum $quantum)
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
            $path = $request->file('image')->store('uploads/quantum', 'public');
            if ($quantum->image && Storage::disk('public')->exists($quantum->image)) {
                Storage::disk('public')->delete($quantum->image);
            }
            $data['image'] = $path;
        }
        $quantum->update($data);
        return redirect()->route('admin.quantum.index')->with('status', 'Updated');
    }

    public function destroy(Quantum $quantum)
    {
        $quantum->delete();
        return redirect()->route('admin.quantum.index')->with('status', 'Deleted');
    }

    private function linesToArray(string $text): array
    {
        return collect(preg_split("/(\r\n|\r|\n)/", trim($text)))->filter()->values()->all();
    }
}


