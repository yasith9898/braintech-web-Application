@extends('layouts.admin')

@section('title', 'Technologies')
@section('subtitle', 'Manage your technologies')

@section('header-actions')
<a href="{{ route('admin.technologies.create') }}" class="btn btn-primary">
    <i class="fas fa-plus me-2"></i>Add Technology
</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body p-0">
        @if($technologies->count() > 0)
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($technologies as $tech)
                        <tr>
                            <td>{{ $tech->name }}</td>
                            <td>{{ $tech->category ?? 'N/A' }}</td>
                            <td>{{ $tech->order }}</td>
                            <td>
                                <a href="{{ route('admin.technologies.edit', $tech->id) }}" class="btn btn-sm btn-outline-primary btn-action">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.technologies.destroy', $tech->id) }}" method="POST" class="d-inline">
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
            <div class="p-4 text-center text-muted">No technologies found. <a href="{{ route('admin.technologies.create') }}">Add your first technology</a></div>
        @endif
    </div>
</div>
@endsection
