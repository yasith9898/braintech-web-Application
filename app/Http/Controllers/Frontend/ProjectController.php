<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = \App\Models\Project::orderBy('order')->get();
        $categories = \App\Models\Project::select('category')->distinct()->whereNotNull('category')->pluck('category');
        return view('frontend.projects.index', compact('projects', 'categories'));
    }

    public function show($slug)
    {
        $project = \App\Models\Project::with('images')->where('slug', $slug)->firstOrFail();
        return view('frontend.projects.show', compact('project'));
    }
}
