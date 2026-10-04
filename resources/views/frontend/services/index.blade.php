@extends('layouts.frontend')

@section('title', 'Services')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold mb-4">Our Services</h1>
                <p class="lead">Comprehensive IT solutions tailored to your business needs</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            @foreach($services as $service)
                <div class="col-lg-4 mb-4">
                    <div class="card service-card h-100">
                        <div class="card-body p-4">
                            <div class="icon">
                                <i class="fas {{ $service->icon }} fa-2x"></i>
                            </div>
                            <h4 class="card-title mb-3">{{ $service->title }}</h4>
                            <p class="card-text">{{ $service->description }}</p>
                            <a href="{{ route('services.show', $service->slug) }}" class="btn btn-outline-primary mt-3">Learn More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
