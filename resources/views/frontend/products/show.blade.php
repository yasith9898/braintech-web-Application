@extends('layouts.frontend')

@section('title', $product->name)

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold mb-4">{{ $product->name }}</h1>
                <p class="lead">{{ Str::limit($product->description, 150) }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Product Details -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body p-4">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded mb-4" alt="{{ $product->name }}">
                        @endif
                        
                        <h3 class="mb-4 text-gradient">Product Overview</h3>
                        <p class="mb-4">{{ $product->description }}</p>
                        
                        @if($product->specifications)
                            <div class="mb-4">
                                <h4 class="mb-3 text-gradient">Specifications</h4>
                                <p>{{ $product->specifications }}</p>
                            </div>
                        @endif
                        
                        <!-- Product Gallery -->
                        @if($product->gallery && count($product->gallery) > 0)
                            <div class="mb-4">
                                <h4 class="mb-3 text-gradient">Product Gallery</h4>
                                <div class="row">
                                    @foreach($product->gallery as $image)
                                        <div class="col-md-4 mb-3">
                                            <img src="{{ asset('storage/' . $image) }}" class="img-fluid rounded" alt="Product Image">
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
                        <h4 class="mb-3 text-gradient">Product Info</h4>
                        <ul class="list-unstyled">
                            @if($product->sku)
                                <li class="mb-3">
                                    <strong>SKU:</strong>
                                    <p class="mb-0">{{ $product->sku }}</p>
                                </li>
                            @endif
                            @if($product->brand)
                                <li class="mb-3">
                                    <strong>Brand:</strong>
                                    <p class="mb-0">{{ $product->brand }}</p>
                                </li>
                            @endif
                            @if($product->model)
                                <li class="mb-3">
                                    <strong>Model:</strong>
                                    <p class="mb-0">{{ $product->model }}</p>
                                </li>
                            @endif
                            @if($product->category)
                                <li class="mb-3">
                                    <strong>Category:</strong>
                                    <p class="mb-0">{{ $product->category }}</p>
                                </li>
                            @endif
                            @if($product->price)
                                <li class="mb-3">
                                    <strong>Price:</strong>
                                    <p class="mb-0 text-gradient fw-bold">{{ $product->currency ?? 'USD' }} {{ number_format($product->price, 2) }}</p>
                                </li>
                            @endif
                            <li class="mb-3">
                                <strong>Stock Status:</strong>
                                <p class="mb-0">
                                    @if($product->in_stock)
                                        <span class="badge bg-success">In Stock ({{ $product->stock_quantity }})</span>
                                    @else
                                        <span class="badge bg-danger">Out of Stock</span>
                                    @endif
                                </p>
                            </li>
                            @if($product->warranty)
                                <li class="mb-3">
                                    <strong>Warranty:</strong>
                                    <p class="mb-0">{{ $product->warranty }}</p>
                                </li>
                            @endif
                            @if($product->weight)
                                <li class="mb-3">
                                    <strong>Weight:</strong>
                                    <p class="mb-0">{{ $product->weight }}</p>
                                </li>
                            @endif
                            @if($product->dimensions)
                                <li class="mb-3">
                                    <strong>Dimensions:</strong>
                                    <p class="mb-0">{{ $product->dimensions }}</p>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-4">
                        <h4 class="mb-3 text-gradient">Interested in this product?</h4>
                        <p class="mb-3">Contact us for more information or to place an order.</p>
                        <a href="{{ route('contact.index') }}" class="btn btn-primary w-100">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
