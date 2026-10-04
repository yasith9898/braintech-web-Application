@extends('layouts.admin')

@section('title', 'Products')
@section('subtitle', 'Manage your hardware products')

@section('header-actions')
<a href="{{ route('admin.products.create') }}" class="btn btn-primary">
    <i class="fas fa-plus me-2"></i>Add Product
</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body p-0">
        @if($products->count() > 0)
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Order</th>
                        <th width="120">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                                @else
                                    <div style="width: 50px; height: 50px; background: #e9ecef; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-box text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $product->name }}</strong>
                                <br>
                                <small class="text-muted">{{ $product->sku ?? 'No SKU' }}</small>
                            </td>
                            <td>{{ $product->category ?? '-' }}</td>
                            <td>
                                @if($product->price)
                                    {{ $product->currency ?? 'USD' }} {{ number_format($product->price, 2) }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                {{ $product->stock_quantity }}
                                @if($product->in_stock)
                                    <span class="badge bg-success ms-1">In Stock</span>
                                @else
                                    <span class="badge bg-danger ms-1">Out of Stock</span>
                                @endif
                            </td>
                            <td>{{ $product->is_featured ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' }}</td>
                            <td>{{ $product->is_active ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' }}</td>
                            <td>{{ $product->order }}</td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-outline-primary btn-action">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger btn-action" onclick="return confirm('Are you sure you want to delete this product?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="p-4 text-center text-muted">No products found. <a href="{{ route('admin.products.create') }}">Add your first product</a></div>
        @endif
    </div>
</div>
@endsection
