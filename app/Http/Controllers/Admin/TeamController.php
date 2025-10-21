<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::ordered()->paginate(12);
        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
            'social_links' => ['nullable', 'array'],
            'social_links.facebook' => ['nullable', 'url'],
            'social_links.instagram' => ['nullable', 'url'],
            'social_links.twitter' => ['nullable', 'url'],
            'social_links.linkedin' => ['nullable', 'url'],
            'social_links.youtube' => ['nullable', 'url'],
            'social_links.website' => ['nullable', 'url'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0']
        ]);

        $data['is_active'] = (bool)($data['is_active'] ?? false);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/teams', 'public');
        }

        // Clean up empty social links
        if (isset($data['social_links'])) {
            $data['social_links'] = array_filter($data['social_links'], function($value) {
                return !empty($value);
            });
        }

        Team::create($data);
        return redirect()->route('admin.teams.index')->with('status', 'Team member created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
            'social_links' => ['nullable', 'array'],
            'social_links.facebook' => ['nullable', 'url'],
            'social_links.instagram' => ['nullable', 'url'],
            'social_links.twitter' => ['nullable', 'url'],
            'social_links.linkedin' => ['nullable', 'url'],
            'social_links.youtube' => ['nullable', 'url'],
            'social_links.website' => ['nullable', 'url'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0']
        ]);

        $data['is_active'] = (bool)($data['is_active'] ?? false);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($team->image) {
                Storage::disk('public')->delete($team->image);
            }
            $data['image'] = $request->file('image')->store('uploads/teams', 'public');
        }

        // Clean up empty social links
        if (isset($data['social_links'])) {
            $data['social_links'] = array_filter($data['social_links'], function($value) {
                return !empty($value);
            });
        }

        $team->update($data);
        return redirect()->route('admin.teams.index')->with('status', 'Team member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        // Delete associated image
        if ($team->image) {
            Storage::disk('public')->delete($team->image);
        }
        
        $team->delete();
        return redirect()->route('admin.teams.index')->with('status', 'Team member deleted successfully');
    }
}
