<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = \App\Models\Service::orderBy('order')->get();
        return view('frontend.services.index', compact('services'));
    }

    public function show($slug)
    {
        $service = \App\Models\Service::where('slug', $slug)->firstOrFail();
        return view('frontend.services.show', compact('service'));
    }
}
