@extends('layouts.frontend')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Transform Your Business with Innovative IT Solutions</h1>
                <p class="lead mb-4">We deliver cutting-edge technology solutions that drive growth and efficiency for businesses worldwide.</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('contact.index') }}" class="btn btn-light btn-lg">Get Started</a>
                    <a href="{{ route('projects.index') }}" class="btn btn-outline-light btn-lg">View Our Work</a>
                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="text-center">
                    <i class="fas fa-laptop-code" style="font-size: 15rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4">
                <div class="stat-item">
                    <h2 class="display-4 fw-bold text-gradient">150+</h2>
                    <p class="mb-0">Projects Completed</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stat-item">
                    <h2 class="display-4 fw-bold text-gradient">50+</h2>
                    <p class="mb-0">Happy Clients</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stat-item">
                    <h2 class="display-4 fw-bold text-gradient">10+</h2>
                    <p class="mb-0">Years Experience</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stat-item">
                    <h2 class="display-4 fw-bold text-gradient">25+</h2>
                    <p class="mb-0">Team Members</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-gradient">Our Services</h2>
            <p>Comprehensive IT solutions tailored to your business needs</p>
        </div>
        <div class="row">
            @foreach($featuredServices as $service)
                <div class="col-lg-4 mb-4">
                    <div class="card service-card h-100">
                        <div class="card-body p-4">
                            <div class="icon">
                                <i class="fas {{ $service->icon }} fa-2x"></i>
                            </div>
                            <h4 class="card-title mb-3">{{ $service->title }}</h4>
                            <p class="card-text">{{ Str::limit($service->description, 150) }}</p>
                            <a href="{{ route('services.show', $service->slug) }}" class="btn btn-outline-primary mt-3">Learn More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('services.index') }}" class="btn btn-primary">View All Services</a>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-gradient">Featured Projects</h2>
            <p>Explore our latest work and success stories</p>
        </div>
        <div class="row">
            @foreach($latestProjects as $project)
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
        <div class="text-center mt-4">
            <a href="{{ route('projects.index') }}" class="btn btn-primary">View All Projects</a>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-gradient">Featured Products</h2>
            <p>Explore our hardware products and solutions</p>
        </div>
        <div class="row">
            @foreach($featuredProducts as $product)
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-box fa-3x"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            @if($product->category)
                                <span class="badge mb-2" style="background: var(--grad-primary);">{{ $product->category }}</span>
                            @endif
                            <h5 class="card-title">{{ $product->name }}</h5>
                            @if($product->brand)
                                <p class="small">{{ $product->brand }}</p>
                            @endif
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            @if($product->price)
                                <p class="text-gradient fw-bold">{{ $product->currency ?? 'USD' }} {{ number_format($product->price, 2) }}</p>
                            @endif
                            @if($product->in_stock)
                                <span class="badge bg-success">In Stock</span>
                            @else
                                <span class="badge bg-danger">Out of Stock</span>
                            @endif
                            <a href="{{ route('products.show', $product->slug) }}" class="btn btn-outline-primary btn-sm mt-2">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-primary">View All Products</a>
        </div>
    </div>
</section>

<!-- Technologies Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-gradient">Technologies We Use</h2>
            <p>Building solutions with modern and reliable technologies</p>
        </div>
        <div class="row">
            @foreach($technologies as $tech)
                <div class="col-md-3 col-6 mb-4">
                    <div class="card text-center h-100">
                        <div class="card-body p-3">
                            @if($tech->logo)
                                <img src="{{ asset('storage/' . $tech->logo) }}" alt="{{ $tech->name }}" class="mb-3" style="max-height: 50px;">
                            @else
                                <div class="tech-icon mx-auto mb-3">
                                    <i class="fas fa-code fa-2x"></i>
                                </div>
                            @endif
                            <h6 class="card-title">{{ $tech->name }}</h6>
                            <small>{{ $tech->category ?? 'Technology' }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-gradient">Meet Our Team</h2>
            <p>Experienced professionals dedicated to your success</p>
        </div>
        <div class="row">
            @foreach($teamMembers as $member)
                <div class="col-lg-3 mb-4">
                    <div class="card text-center h-100">
                        @if($member->photo)
                            <img src="{{ asset('storage/' . $member->photo) }}" class="card-img-top rounded-circle mx-auto mt-4" alt="{{ $member->name }}" style="width: 120px; height: 120px; object-fit: cover;">
                        @else
                            <div class="card-img-top rounded-circle mx-auto mt-4 d-flex align-items-center justify-content-center" style="width: 120px; height: 120px;">
                                <i class="fas fa-user fa-3x"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $member->name }}</h5>
                            <p class="text-gradient mb-2">{{ $member->position }}</p>
                            <p class="card-text small">{{ Str::limit($member->bio, 80) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-gradient">What Our Clients Say</h2>
            <p>Trusted by businesses worldwide</p>
        </div>
        <div class="row">
            @foreach($testimonials as $testimonial)
                <div class="col-lg-6 mb-4">
                    <div class="testimonial-card h-100">
                        <div class="d-flex align-items-center mb-3">
                            @if($testimonial->avatar)
                                <img src="{{ asset('storage/' . $testimonial->avatar) }}" class="rounded-circle me-3" alt="{{ $testimonial->name }}" style="width: 60px; height: 60px; object-fit: cover;">
                            @else
                                <div class="rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                    <i class="fas fa-user fa-2x"></i>
                                </div>
                            @endif
                            <div>
                                <h6 class="mb-0">{{ $testimonial->name }}</h6>
                                <small>{{ $testimonial->company ?? '' }} {{ $testimonial->position ? '- ' . $testimonial->position : '' }}</small>
                            </div>
                        </div>
                        <p class="mb-3">"{{ $testimonial->content }}"</p>
                        <div class="text-warning">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $testimonial->rating ? '' : 'far' }}"></i>
                            @endfor
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
        <h2 class="display-5 fw-bold mb-4">Ready to Start Your Project?</h2>
        <p class="lead mb-4">Let's discuss how we can help transform your business with our IT solutions.</p>
        <a href="{{ route('contact.index') }}" class="btn btn-light btn-lg">Contact Us Today</a>
    </div>
</section>
@endsection
