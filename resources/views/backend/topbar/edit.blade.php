@extends('dashboard')
@section('main')

<div class="container-xxl container-p-y">
    <h4 class="fw-bold mb-4">Edit Topbar Info</h4>

    <form action="{{ route('topbar.update', $topbar->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Location</label>
            <input name="location" type="text" class="form-control" value="{{ $topbar->location }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input name="phone" type="text" class="form-control" value="{{ $topbar->phone }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control" value="{{ $topbar->email }}" required>
        </div>

        <h5 class="mt-4">Social Links</h5>
        @foreach(['facebook', 'twitter', 'instagram', 'linkedin', 'whatsapp'] as $platform)

        <div class="mb-2">
            <input 
                type="text" 
                name="socials[{{ $platform }}]" 
                class="form-control"
                value="{{ $topbar->socials[$platform] ?? '' }}"
                placeholder="{{ ucfirst($platform) }} URL or @username"
                pattern="(https?:\/\/[^\s]+)|(@?[a-zA-Z0-9_\.]+)"
                title="Enter full URL (https://...) or username (with or without @)"
            >
        </div>

        @endforeach

        <button type="submit" class="btn btn-primary mt-3">Update Topbar Info</button>
    </form>
</div>

@endsection
