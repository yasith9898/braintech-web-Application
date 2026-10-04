<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = \App\Models\TeamMember::orderBy('order')->get();
        return view('admin.team-members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team-members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:team_members,slug',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'nullable|email|max:255',
            'linkedin' => 'nullable|url',
            'twitter' => 'nullable|url',
            'github' => 'nullable|url',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $request->input('order', 0);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('team-members', 'public');
        }

        \App\Models\TeamMember::create($validated);
        return redirect()->route('admin.team-members.index')->with('success', 'Team member created successfully.');
    }

    public function show(string $id)
    {
        $member = \App\Models\TeamMember::findOrFail($id);
        return view('admin.team-members.show', compact('member'));
    }

    public function edit(string $id)
    {
        $member = \App\Models\TeamMember::findOrFail($id);
        return view('admin.team-members.edit', compact('member'));
    }

    public function update(Request $request, string $id)
    {
        $member = \App\Models\TeamMember::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:team_members,slug,' . $id,
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'nullable|email|max:255',
            'linkedin' => 'nullable|url',
            'twitter' => 'nullable|url',
            'github' => 'nullable|url',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $request->input('order', 0);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('team-members', 'public');
        }

        $member->update($validated);
        return redirect()->route('admin.team-members.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(string $id)
    {
        $member = \App\Models\TeamMember::findOrFail($id);
        $member->delete();
        return redirect()->route('admin.team-members.index')->with('success', 'Team member deleted successfully.');
    }
}
