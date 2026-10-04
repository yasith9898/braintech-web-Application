@extends('layouts.admin')

@section('title', 'Team Members')
@section('subtitle', 'Manage your team members')

@section('header-actions')
<a href="{{ route('admin.team-members.create') }}" class="btn btn-primary">
    <i class="fas fa-plus me-2"></i>Add Team Member
</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body p-0">
        @if($members->count() > 0)
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Active</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $member)
                        <tr>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->position }}</td>
                            <td>{{ $member->email ?? 'N/A' }}</td>
                            <td>{{ $member->is_active ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' }}</td>
                            <td>{{ $member->order }}</td>
                            <td>
                                <a href="{{ route('admin.team-members.edit', $member->id) }}" class="btn btn-sm btn-outline-primary btn-action">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.team-members.destroy', $member->id) }}" method="POST" class="d-inline">
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
            <div class="p-4 text-center text-muted">No team members found. <a href="{{ route('admin.team-members.create') }}">Add your first team member</a></div>
        @endif
    </div>
</div>
@endsection
