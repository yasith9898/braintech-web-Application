@extends('layouts.frontend')

@section('title', 'About Us')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold mb-4">About Us</h1>
                <p class="lead">Building the future with innovative technology solutions</p>
            </div>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <h2 class="display-5 fw-bold mb-4 text-gradient">Our Story</h2>
                <p class="mb-4">{{ \App\Models\Setting::get('company_description', 'Leading IT solutions provider specializing in web development, mobile apps, and cloud services.') }}</p>
                <p class="mb-4">Founded with a vision to transform businesses through technology, we have grown into a trusted partner for organizations worldwide. Our team of experts combines technical excellence with creative problem-solving to deliver solutions that drive real results.</p>
                <div class="row mt-4">
                    <div class="col-6 mb-3">
                        <h4 class="fw-bold text-gradient">10+</h4>
                        <p class="mb-0">Years of Experience</p>
                    </div>
                    <div class="col-6 mb-3">
                        <h4 class="fw-bold text-gradient">150+</h4>
                        <p class="mb-0">Projects Delivered</p>
                    </div>
                    <div class="col-6 mb-3">
                        <h4 class="fw-bold text-gradient">50+</h4>
                        <p class="mb-0">Happy Clients</p>
                    </div>
                    <div class="col-6 mb-3">
                        <h4 class="fw-bold text-gradient">25+</h4>
                        <p class="mb-0">Team Members</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bg-glass rounded p-5 text-center">
                    <i class="fas fa-building fa-5x" style="opacity: 0.3;"></i>
                </div>
            </div>
        </div>

        <!-- Mission & Vision -->
        <div class="row mt-5">
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body p-5">
                        <div class="icon mb-3">
                            <i class="fas fa-bullseye fa-2x"></i>
                        </div>
                        <h3 class="card-title mb-3">Our Mission</h3>
                        <p class="card-text">To empower businesses with innovative technology solutions that drive growth, efficiency, and competitive advantage. We are committed to delivering excellence in every project and building long-term partnerships with our clients.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body p-5">
                        <div class="icon mb-3">
                            <i class="fas fa-eye fa-2x"></i>
                        </div>
                        <h3 class="card-title mb-3">Our Vision</h3>
                        <p class="card-text">To be the leading technology partner for businesses worldwide, recognized for our innovation, reliability, and commitment to client success. We aim to shape the future of technology and make it accessible to organizations of all sizes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-gradient">Our Team</h2>
            <p>Meet the talented people behind our success</p>
        </div>
        <div class="row">
            @foreach($teamMembers as $member)
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            @if($member->photo)
                                <img src="{{ asset('storage/' . $member->photo) }}" class="rounded-circle mb-3" alt="{{ $member->name }}" style="width: 120px; height: 120px; object-fit: cover;">
                            @else
                                <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 120px; height: 120px;">
                                    <i class="fas fa-user fa-3x"></i>
                                </div>
                            @endif
                            <h4 class="card-title">{{ $member->name }}</h4>
                            <p class="text-gradient mb-3">{{ $member->position }}</p>
                            <p class="card-text">{{ $member->bio }}</p>
                            <div class="social-links mt-3">
                                @if($member->linkedin)
                                    <a href="{{ $member->linkedin }}" class="me-3"><i class="fab fa-linkedin-in"></i></a>
                                @endif
                                @if($member->twitter)
                                    <a href="{{ $member->twitter }}" class="me-3"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if($member->github)
                                    <a href="{{ $member->github }}"><i class="fab fa-github"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 text-white" style="background: var(--grad-primary);">
    <div class="container text-center">
        <h2 class="display-5 fw-bold mb-4">Join Our Team</h2>
        <p class="lead mb-4">We're always looking for talented individuals to join our growing team.</p>
        <a href="{{ route('contact.index') }}" class="btn btn-light btn-lg">Get In Touch</a>
    </div>
</section>
@endsection
