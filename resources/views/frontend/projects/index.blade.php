@extends('layouts.frontend')

@section('title', 'Projects')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold mb-4">Our Projects</h1>
                <p class="lead">Explore our portfolio of successful projects</p>
            </div>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="py-4 border-bottom" style="border-color: var(--border-default);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('projects.index') }}" class="btn {{ !request('category') ? 'btn-primary' : 'btn-outline-primary' }}">All</a>
                    @foreach($categories as $category)
                        <a href="{{ route('projects.index', ['category' => $category]) }}" class="btn {{ request('category') == $category ? 'btn-primary' : 'btn-outline-primary' }}">{{ $category }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            @foreach($projects as $project)
                <div class="col-lg-4 mb-4">
                    <div class="card project-card h-100">
                        @if($project->thumbnail)
                            <img src="{{ asset('storage/' . $project->thumbnail) }}" class="card-img-top" alt="{{ $project->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-image fa-3x"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <span class="badge mb-2" style="background: var(--grad-primary);">{{ $project->category ?? 'Project' }}</span>
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                            <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-outline-primary btn-sm">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
