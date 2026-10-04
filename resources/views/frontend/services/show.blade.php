@extends('layouts.frontend')

@section('title', $service->title)

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold mb-4">{{ $service->title }}</h1>
                <p class="lead">{{ Str::limit($service->description, 150) }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Service Details -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body p-4">
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" class="img-fluid rounded mb-4" alt="{{ $service->title }}">
                        @endif
                        <h3 class="mb-4 text-gradient">About This Service</h3>
                        <p>{{ $service->description }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body p-4">
                        <h4 class="mb-3 text-gradient">Quick Contact</h4>
                        <p class="mb-3">Interested in this service? Get in touch with us today.</p>
                        <a href="{{ route('contact.index') }}" class="btn btn-primary w-100">Contact Us</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-4">
                        <h4 class="mb-3 text-gradient">Other Services</h4>
                        <ul class="list-unstyled">
                            @foreach(\App\Models\Service::where('id', '!=', $service->id)->take(5)->get() as $otherService)
                                <li class="mb-2">
                                    <a href="{{ route('services.show', $otherService->slug) }}" class="text-decoration-none">
                                        <i class="fas fa-chevron-right me-2"></i>{{ $otherService->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
