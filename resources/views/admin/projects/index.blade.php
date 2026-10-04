@extends('layouts.admin')

@section('title', 'Projects')
@section('subtitle', 'Manage your projects')

@section('header-actions')
<a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
    <i class="fas fa-plus me-2"></i>Add Project
</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body p-0">
        @if($projects->count() > 0)
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Client</th>
                        <th>Featured</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->category ?? 'N/A' }}</td>
                            <td>{{ $project->client ?? 'N/A' }}</td>
                            <td>{{ $project->is_featured ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' }}</td>
                            <td>{{ $project->order }}</td>
                            <td>
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-outline-primary btn-action">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline">
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
            <div class="p-4 text-center text-muted">No projects found. <a href="{{ route('admin.projects.create') }}">Add your first project</a></div>
        @endif
    </div>
</div>
@endsection
