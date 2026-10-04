@extends('layouts.frontend')

@section('title', 'Technologies')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold mb-4">Technologies</h1>
                <p class="lead">Building solutions with modern and reliable technologies</p>
            </div>
        </div>
    </div>
</section>

<!-- Technologies Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            @foreach($technologies as $tech)
                <div class="col-lg-3 col-md-4 col-6 mb-4">
                    <div class="card text-center h-100">
                        <div class="card-body p-4">
                            @if($tech->logo)
                                <img src="{{ asset('storage/' . $tech->logo) }}" alt="{{ $tech->name }}" class="mb-3" style="max-height: 60px;">
                            @else
                                <div class="tech-icon mx-auto mb-3">
                                    <i class="fas fa-code fa-2x"></i>
                                </div>
                            @endif
                            <h5 class="card-title">{{ $tech->name }}</h5>
                            <p class="small mb-2">{{ $tech->category ?? 'Technology' }}</p>
                            @if($tech->description)
                                <p class="card-text small">{{ Str::limit($tech->description, 80) }}</p>
                            @endif
                            @if($tech->url)
                                <a href="{{ $tech->url }}" target="_blank" class="btn btn-outline-primary btn-sm mt-2">Learn More</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
