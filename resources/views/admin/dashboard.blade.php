@extends('layouts.admin')

@section('title', 'Dashboard')
@section('subtitle', 'Overview of your website')

@section('content')
<!-- Stats Cards -->
<div class="row">
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stat-card">
            <div class="icon blue">
                <i class="fas fa-cogs"></i>
            </div>
            <h3 class="display-6 fw-bold">{{ $stats['services'] }}</h3>
            <p class="text-muted mb-0">Total Services</p>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stat-card">
            <div class="icon green">
                <i class="fas fa-briefcase"></i>
            </div>
            <h3 class="display-6 fw-bold">{{ $stats['projects'] }}</h3>
            <p class="text-muted mb-0">Total Projects</p>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stat-card">
            <div class="icon yellow">
                <i class="fas fa-code"></i>
            </div>
            <h3 class="display-6 fw-bold">{{ $stats['technologies'] }}</h3>
            <p class="text-muted mb-0">Technologies</p>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stat-card">
            <div class="icon red">
                <i class="fas fa-envelope"></i>
            </div>
            <h3 class="display-6 fw-bold">{{ $stats['contact_messages'] }}</h3>
            <p class="text-muted mb-0">Unread Messages</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Recent Contact Messages</h5>
            </div>
            <div class="card-body p-0">
                @if($recentMessages->count() > 0)
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentMessages as $message)
                                <tr>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ Str::limit($message->subject, 30) }}</td>
                                    <td>{{ $message->created_at->format('M d, Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="p-4 text-center text-muted">No messages yet</div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Recent Projects</h5>
            </div>
            <div class="card-body p-0">
                @if($recentProjects->count() > 0)
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentProjects as $project)
                                <tr>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->category ?? 'N/A' }}</td>
                                    <td>{{ $project->created_at->format('M d, Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="p-4 text-center text-muted">No projects yet</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
