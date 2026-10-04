@extends('layouts.admin')

@section('title', 'Testimonials')
@section('subtitle', 'Manage your testimonials')

@section('header-actions')
<a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
    <i class="fas fa-plus me-2"></i>Add Testimonial
</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body p-0">
        @if($testimonials->count() > 0)
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Rating</th>
                        <th>Published</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonials as $testimonial)
                        <tr>
                            <td>{{ $testimonial->name }}</td>
                            <td>{{ $testimonial->company ?? 'N/A' }}</td>
                            <td>{{ $testimonial->rating }}/5</td>
                            <td>{{ $testimonial->is_published ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' }}</td>
                            <td>{{ $testimonial->order }}</td>
                            <td>
                                <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-sm btn-outline-primary btn-action">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="d-inline">
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
            <div class="p-4 text-center text-muted">No testimonials found. <a href="{{ route('admin.testimonials.create') }}">Add your first testimonial</a></div>
        @endif
    </div>
</div>
@endsection
