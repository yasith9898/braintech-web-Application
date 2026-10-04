<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = \App\Models\Technology::orderBy('order')->get();
        return view('admin.technologies.index', compact('technologies'));
    }

    public function create()
    {
        return view('admin.technologies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:technologies,slug',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url' => 'nullable|url',
            'category' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $validated['order'] = $request->input('order', 0);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('technologies', 'public');
        }

        \App\Models\Technology::create($validated);
        return redirect()->route('admin.technologies.index')->with('success', 'Technology created successfully.');
    }

    public function show(string $id)
    {
        $technology = \App\Models\Technology::findOrFail($id);
        return view('admin.technologies.show', compact('technology'));
    }

    public function edit(string $id)
    {
        $technology = \App\Models\Technology::findOrFail($id);
        return view('admin.technologies.edit', compact('technology'));
    }

    public function update(Request $request, string $id)
    {
        $technology = \App\Models\Technology::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:technologies,slug,' . $id,
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url' => 'nullable|url',
            'category' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $validated['order'] = $request->input('order', 0);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('technologies', 'public');
        }

        $technology->update($validated);
        return redirect()->route('admin.technologies.index')->with('success', 'Technology updated successfully.');
    }

    public function destroy(string $id)
    {
        $technology = \App\Models\Technology::findOrFail($id);
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('success', 'Technology deleted successfully.');
    }
}
