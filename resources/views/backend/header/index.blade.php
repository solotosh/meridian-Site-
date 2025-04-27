@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Settings /</span> Header
    </h4>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Header Settings</h5>
            @if ($header)
            <a href="{{ route('admin.header.edit', $header->id) }}" class="btn btn-warning">
                <i class="bx bx-edit-alt me-1"></i> Edit
            </a>
        @else
            <div class="alert alert-danger mt-3">
                No header settings found. Please create one in the database.
            </div>
        @endif
        
        </div>

        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Address:</strong> {{ $header->address }}</li>
                <li class="list-group-item"><strong>Working Hours:</strong> {{ $header->hours }}</li>
                <li class="list-group-item"><strong>Phone:</strong> {{ $header->phone }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $header->email }}</li>
                <li class="list-group-item"><strong>Social Links:</strong>
                    @php $socials = json_decode($header->social_links, true); @endphp
                    @foreach($socials as $key => $link)
                        <span class="badge bg-primary me-1">{{ ucfirst($key) }}: {{ $link }}</span>
                    @endforeach
                </li>
                <li class="list-group-item">
                    <strong>Logo:</strong>
                    <br>
                    <img src="{{ asset($header->logo) }}" alt="Logo" width="100" class="img-thumbnail">
                </li>
                <li class="list-group-item">
                    <strong>Mobile Logo:</strong>
                    <br>
                    <img src="{{ asset($header->mobile_logo) }}" alt="Mobile Logo" width="100" class="img-thumbnail">
                </li>
                
            </ul>
        </div>
    </div>
</div>

@endsection
