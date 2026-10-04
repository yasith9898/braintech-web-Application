@extends('layouts.admin')

@section('title', 'Services')
@section('subtitle', 'Manage your services')

@section('header-actions')
<a href="{{ route('admin.services.create') }}" class="btn btn-primary">
    <i class="fas fa-plus me-2"></i>Add Service
</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body p-0">
        @if($services->count() > 0)
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Icon</th>
                        <th>Featured</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td>{{ $service->title }}</td>
                            <td><i class="fas {{ $service->icon }}"></i></td>
                            <td>{{ $service->is_featured ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' }}</td>
                            <td>{{ $service->order }}</td>
                            <td>
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-outline-primary btn-action">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger btn-action" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="p-4 text-center text-muted">No services found. <a href="{{ route('admin.services.create') }}">Add your first service</a></div>
        @endif
    </div>
</div>
@endsection
