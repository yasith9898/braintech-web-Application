@extends('layouts.frontend')

@section('title', $project->title)

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold mb-4">{{ $project->title }}</h1>
                <p class="lead">{{ Str::limit($project->description, 150) }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Project Details -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body p-4">
                        @if($project->thumbnail)
                            <img src="{{ asset('storage/' . $project->thumbnail) }}" class="img-fluid rounded mb-4" alt="{{ $project->title }}">
                        @endif
                        
                        <h3 class="mb-4 text-gradient">Project Overview</h3>
                        <p class="mb-4">{{ $project->description }}</p>
                        
                        @if($project->content)
                            <div class="mb-4">
                                <h4 class="mb-3">Project Details</h4>
                                <p>{{ $project->content }}</p>
                            </div>
                        @endif
                        
                        <!-- Project Gallery -->
                        @if($project->images && $project->images->count() > 0)
                            <div class="mb-4">
                                <h4 class="mb-3">Project Gallery</h4>
                                <div class="row">
                                    @foreach($project->images as $image)
                                        <div class="col-md-4 mb-3">
                                            <img src="{{ asset('storage/' . $image->image_path) }}" class="img-fluid rounded" alt="{{ $image->caption ?? 'Project Image' }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body p-4">
                        <h4 class="mb-3 text-gradient">Project Info</h4>
                        <ul class="list-unstyled">
                            @if($project->client)
                                <li class="mb-3">
                                    <strong>Client:</strong>
                                    <p class="mb-0">{{ $project->client }}</p>
                                </li>
                            @endif
                            @if($project->category)
                                <li class="mb-3">
                                    <strong>Category:</strong>
                                    <p class="mb-0">{{ $project->category }}</p>
                                </li>
                            @endif
                            @if($project->completed_date)
                                <li class="mb-3">
                                    <strong>Completed:</strong>
                                    <p class="mb-0">{{ $project->completed_date->format('F Y') }}</p>
                                </li>
                            @endif
                            @if($project->project_url)
                                <li class="mb-3">
                                    <strong>Project URL:</strong>
                                    <p class="mb-0">
                                        <a href="{{ $project->project_url }}" target="_blank">View Project <i class="fas fa-external-link-alt"></i></a>
                                    </p>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-4">
                        <h4 class="mb-3 text-gradient">Start Your Project</h4>
                        <p class="mb-3">Ready to start your next project? Get in touch with us today.</p>
                        <a href="{{ route('contact.index') }}" class="btn btn-primary w-100">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
