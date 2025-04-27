@extends('dashboard')
@section('main')

<div class="container-xxl container-p-y">
    <h4 class="fw-bold mb-4">Create Topbar Info</h4>

    <form action="{{ route('topbar.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Location</label>
            <input name="location" type="text" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input name="phone" type="text" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control" required>
        </div>

        <h5 class="mt-4">Social Links</h5>
        @foreach(['facebook', 'twitter', 'instagram', 'linkedin', 'whatsapp'] as $platform)
            <div class="mb-2">
                <input 
                type="text" 
                name="socials[{{ $platform }}]" 
                placeholder="{{ ucfirst($platform) }} username" 
                pattern="@?[a-zA-Z0-9_\.]+"
                title="Enter username (with or without @)"
              >
            </div>
        @endforeach

        <button type="submit" class="btn btn-success mt-3">Save Topbar Info</button>
    </form>
</div>

@endsection
