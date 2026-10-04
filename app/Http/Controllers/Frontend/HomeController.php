<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredServices = \App\Models\Service::where('is_featured', true)->orderBy('order')->get();
        $latestProjects = \App\Models\Project::where('is_featured', true)->latest()->take(6)->get();
        $featuredProducts = \App\Models\Product::where('is_featured', true)->where('is_active', true)->orderBy('order')->take(6)->get();
        $testimonials = \App\Models\Testimonial::where('is_published', true)->orderBy('order')->take(6)->get();
        $technologies = \App\Models\Technology::orderBy('order')->take(12)->get();
        $teamMembers = \App\Models\TeamMember::where('is_active', true)->orderBy('order')->take(4)->get();
        
        return view('frontend.home', compact('featuredServices', 'latestProjects', 'featuredProducts', 'testimonials', 'technologies', 'teamMembers'));
    }

    public function about()
    {
        $teamMembers = \App\Models\TeamMember::where('is_active', true)->orderBy('order')->get();
        return view('frontend.about', compact('teamMembers'));
    }
}
