@extends('dashboard')
@section('main')

<div class="container-xxl container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Topbar Settings</h4>
        @if(!$topbar)
            <a href="{{ route('topbar.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Add Topbar Info</a>
        @else
            <a href="{{ route('topbar.edit', $topbar->id) }}" class="btn btn-warning"><i class="bx bx-edit"></i> Edit Topbar</a>
        @endif
    </div>

    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @if($topbar)
        <div class="card p-4">
            <h5>Location</h5>
            <p>{{ $topbar->location }}</p>

            <h5>Phone</h5>
            <p>{{ $topbar->phone }}</p>

            <h5>Email</h5>
            <p>{{ $topbar->email }}</p>

            <h5>Social Links</h5>
            @foreach($topbar->socials as $platform => $url)
                <p><strong>{{ ucfirst($platform) }}:</strong> <a href="{{ $url }}" target="_blank">{{ $url }}</a></p>
            @endforeach
        </div>
    @endif
</div>

@endsection
