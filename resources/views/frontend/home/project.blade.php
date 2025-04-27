@php
    $projects = \App\Models\Project::latest()->take(6)->get();
@endphp

<style>
.project-item {
    transition: all 0.3s ease-in-out;
    border: 1px solid rgba(0,0,0,0.1) !important; /* Light border instead of dark blue */
}

.project-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1.25rem rgba(0,0,0,0.1);
    border-color: #00ff88 !important; /* Only show green border on hover */
}

.project-icon i {
    transition: transform 0.3s ease;
}

.project-icon:hover i {
    transform: scale(1.1);
}

/* Remove any dark blue background transitions */
.project-content::after {
    background: transparent !important;
}
</style>

<div class="container-fluid project py-5 bg-light">
    <div class="container">
        <!-- Section Title -->
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h4 class="text-success text-uppercase mb-2">Our Projects</h4>
            <h2 class="fw-bold text-dark fs-2">Explore Our Latest Projects</h2>
        </div>

        <!-- Carousel -->
        <div class="project-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">
            @foreach($projects as $project)
            <div class="project-item bg-white rounded shadow-sm overflow-hidden h-100">
                <!-- Image -->
                <div class="project-img">
                    <img src="{{ asset($project->image ?? 'frontend/img/default.jpg') }}" 
                         class="img-fluid w-100" 
                         alt="{{ $project->title }}">
                </div>

                <!-- Content -->
                <div class="project-content bg-white p-4">
                    <div class="project-content-inner">
                        @if($project->icon)
                        <div class="project-icon mb-3">
                            <i class="{{ $project->icon }} fa-3x text-primary"></i>
                        </div>
                        @endif

                        <p class="text-muted mb-2 small">{{ $project->tagline }}</p>
                        <h5 class="text-dark fw-semibold mb-3">{{ $project->title }}</h5>

                        <a class="btn btn-outline-success rounded-pill py-2 px-4" href="{{ $project->link ?? '#' }}">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>