@extends('layouts.admin')

@section('title', 'Contact Messages')
@section('subtitle', 'Manage your contact messages')

@section('content')
<div class="card">
    <div class="card-body p-0">
        @if($messages->count() > 0)
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                        <tr class="{{ $message->is_read ? '' : 'table-primary' }}">
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ Str::limit($message->subject, 30) }}</td>
                            <td>{{ $message->created_at->format('M d, Y') }}</td>
                            <td>{{ $message->is_read ? '<span class="badge bg-secondary">Read</span>' : '<span class="badge bg-primary">Unread</span>' }}</td>
                            <td>
                                <a href="{{ route('admin.contact-messages.show', $message->id) }}" class="btn btn-sm btn-outline-primary btn-action">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @if(!$message->is_read)
                                    <form action="{{ route('admin.contact-messages.mark-read', $message->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-success btn-action">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                @endif
                                <form action="{{ route('admin.contact-messages.destroy', $message->id) }}" method="POST" class="d-inline">
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
            <div class="p-4 text-center text-muted">No messages found.</div>
        @endif
    </div>
</div>
@endsection
