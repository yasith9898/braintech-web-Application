@extends('layouts.frontend')

@section('title', 'Products')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold mb-4">Our Products</h1>
                <p class="lead">Explore our hardware products and solutions</p>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            @foreach($products as $product)
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
    </div>
</section>
@endsection
