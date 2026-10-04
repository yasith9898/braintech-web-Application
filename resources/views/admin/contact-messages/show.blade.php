@extends('layouts.admin')

@section('title', 'View Message')

@section('header-actions')
<a href="{{ route('admin.contact-messages.index') }}" class="btn btn-secondary">
    <i class="fas fa-arrow-left me-2"></i>Back to Messages
</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>Name:</strong>
                <p class="text-muted">{{ $message->name }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Email:</strong>
                <p class="text-muted">{{ $message->email }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>Phone:</strong>
                <p class="text-muted">{{ $message->phone ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Subject:</strong>
                <p class="text-muted">{{ $message->subject }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>Date:</strong>
                <p class="text-muted">{{ $message->created_at->format('F d, Y - g:i A') }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Status:</strong>
                <p class="text-muted">{{ $message->is_read ? 'Read' : 'Unread' }}</p>
            </div>
        </div>
        <div class="mb-4">
            <strong>Message:</strong>
            <p class="text-muted">{{ $message->message }}</p>
        </div>
        <div class="d-flex gap-2">
            <a href="mailto:{{ $message->email }}" class="btn btn-primary">
                <i class="fas fa-reply me-2"></i>Reply via Email
            </a>
            <form action="{{ route('admin.contact-messages.destroy', $message->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this message?')">
                    <i class="fas fa-trash me-2"></i>Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
