@extends('layouts.admin')

@section('title', 'Settings')
@section('subtitle', 'Manage website settings')

@section('content')
<form method="POST" action="{{ route('admin.settings.update') }}">
    @csrf
    @method('PUT')
    
    @foreach($settings as $group => $groupSettings)
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">{{ ucfirst($group) }} Settings</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($groupSettings as $setting)
                        <div class="col-md-6 mb-3">
                            <label for="{{ $setting->key }}" class="form-label">{{ ucfirst(str_replace('_', ' ', $setting->key)) }}</label>
                            @if($setting->type == 'textarea')
                                <textarea class="form-control" id="{{ $setting->key }}" name="{{ $setting->key }}" rows="3">{{ $setting->value }}</textarea>
                            @elseif($setting->type == 'url')
                                <input type="url" class="form-control" id="{{ $setting->key }}" name="{{ $setting->key }}" value="{{ $setting->value }}">
                            @elseif($setting->type == 'email')
                                <input type="email" class="form-control" id="{{ $setting->key }}" name="{{ $setting->key }}" value="{{ $setting->value }}">
                            @else
                                <input type="text" class="form-control" id="{{ $setting->key }}" name="{{ $setting->key }}" value="{{ $setting->value }}">
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
    
    <button type="submit" class="btn btn-primary">Save Settings</button>
</form>
@endsection
