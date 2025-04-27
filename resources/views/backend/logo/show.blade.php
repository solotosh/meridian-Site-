@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Logo /</span> Current Logo
    </h4>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logocreate') }}">
            <i class="bx bx-upload"></i> Upload Logo
        </a>
    </li>
    
    @if ($logo && $logo->logo)
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">Current Site Logo</h5>
                <img src="{{ asset('uploads/logo/' . $logo->logo) }}" alt="Logo" class="img-fluid" style="max-height: 120px;">
            </div>
        </div>
    @else
        <div class="alert alert-warning">
            No logo uploaded yet.
        </div>
    @endif
</div>

@endsection
