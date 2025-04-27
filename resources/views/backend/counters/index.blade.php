@extends('dashboard')

@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Contact /</span> Update Contact Information
    </h4>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.contact.update') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $contact->email ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $contact->phone ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address', $contact->address ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Map Latitude</label>
                    <input type="text" name="map_lat" class="form-control" value="{{ old('map_lat', $contact->map_lat ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Map Longitude</label>
                    <input type="text" name="map_lng" class="form-control" value="{{ old('map_lng', $contact->map_lng ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Map Title</label>
                    <input type="text" name="map_title" class="form-control" value="{{ old('map_title', $contact->map_title ?? '') }}">
                </div>

                <button type="submit" class="btn btn-success">Update Contact Info</button>
            </form>
        </div>
    </div>
</div>
@endsection
