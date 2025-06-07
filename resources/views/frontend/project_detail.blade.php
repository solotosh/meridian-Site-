@extends('frontend.master_dashboard')

@section('main')

<!-- Breadcrumb -->
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('project.home') }}">Projects</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $project->title }}</li>
        </ol>
    </nav>
</div>

<!-- Project Detail -->
<div class="container-fluid py-5 bg-light mt-5"> <!-- Increased margin-top to mt-5 -->
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-6">
                <!-- Image with lightbox feature -->
                <a href="{{ asset($project->image ?? 'frontend/img/default.jpg') }}" data-lightbox="project-image">
                    <img src="{{ asset($project->image ?? 'frontend/img/default.jpg') }}" class="img-fluid rounded shadow" alt="{{ $project->title }}">
                </a>
            </div>
            <div class="col-lg-6">
                <h5 class="text-primary">Project Detail</h5>
                <h2 class="fw-bold mb-4">{{ $project->title }}</h2>
                @if($project->icon)
                    <i class="{{ $project->icon }} fa-2x text-success mb-3"></i>
                @endif
                <p class="text-muted">{{ $project->description }}</p>

                {{-- Uncomment if there's a project link --}}
                {{-- @if($project->link)
                <a href="{{ $project->link }}" class="btn btn-outline-success rounded-pill mt-3" target="_blank">Visit Project</a>
                @endif --}}
            </div>
        </div>

        <!-- Related Projects Section -->
        @if($relatedProjects->count())
        <div class="pt-5">
            <h4 class="mb-4">Related Projects</h4>
            <div class="row g-4">
                @foreach($relatedProjects as $item)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <!-- Link to the related project -->
                        <a href="{{ route('project.detail', $item->id) }}">
                            <img src="{{ asset($item->image ?? 'frontend/img/default.jpg') }}" class="card-img-top" alt="{{ $item->title }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($item->description, 200) }}</p>
                            <a href="{{ route('project.detail', $item->id) }}" class="theme-btn btn-two">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Lightbox2 for image lightbox -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>

@endsection
