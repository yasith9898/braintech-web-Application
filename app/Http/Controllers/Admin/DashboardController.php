<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => \App\Models\Service::count(),
            'projects' => \App\Models\Project::count(),
            'technologies' => \App\Models\Technology::count(),
            'team_members' => \App\Models\TeamMember::count(),
            'testimonials' => \App\Models\Testimonial::count(),
            'contact_messages' => \App\Models\ContactMessage::where('is_read', false)->count(),
        ];

        $recentMessages = \App\Models\ContactMessage::latest()->take(5)->get();
        $recentProjects = \App\Models\Project::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'recentProjects'));
    }
}
