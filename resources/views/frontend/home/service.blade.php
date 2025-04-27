@php
    $services = \App\Models\Service::oldest()->take(4)->get();
@endphp

<style>
.service-item {
    transition: all 0.3s ease;
    border: 1px solid rgba(0,0,0,0.1) !important;
    position: relative;
}

.service-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.75rem 1.5rem rgba(131, 5, 214, 0.1);
    border-color: #00ff88 !important;
}

.service-img {
    overflow: hidden;
    position: relative;
}

.service-img img {
    transition: transform 0.3s ease;
    width: 100%;
    height: auto;
    display: block;
}

.service-img:hover img {
    transform: scale(1.05);
}

.service-content {
    position: relative;
    z-index: 2;
}

/* Button styles - completely remove dark blue */
.btn-outline-success {
    border-color: #28a745 !important;
    color: #28a745 !important;
    background-color: transparent !important;
}

.btn-outline-success:hover,
.btn-outline-success:focus {
    background-color: #28a745 !important;
    color: white !important;
    border-color: #28a745 !important;
}

/* Remove all dark blue backgrounds */
.service-item .service-content::after {
    background: transparent !important;
    display: none !important;
}

/* Make sure buttons are always clickable */
.btn {
    position: relative;
    z-index: 10;
    pointer-events: auto !important;
}

/* Remove any potential overlay issues */
.service-item::after {
    content: none !important;
}
</style>

<div class="container-fluid service py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h5 class="text-success text-uppercase mb-2">Our Services</h5>
            <h2 class="fw-bold text-dark fs-2">Offering the Best Consulting & Meridian Mapping Services</h2>
        </div>

        <div class="row g-4 justify-content-center text-center">
            @foreach($services as $index => $service)
            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="{{ 0.1 + ($index * 0.2) }}s">
                <div class="service-item bg-white rounded shadow-sm h-100" style="overflow: visible;">
                    <div class="service-img">
                        <img src="{{ asset($service->image ?? 'frontend/img/default.jpg') }}" class="img-fluid rounded-top" alt="{{ $service->title }}">
                    </div>
                    <div class="service-content p-4">
                        <div class="d-flex align-items-start mb-3">
                            @if($service->icon)
                                <i class="{{ $service->icon }} fa-2x text-primary me-3"></i>
                            @endif
                            <h5 class="text-start text-dark m-0">{{ $service->title }}</h5>
                        </div>
                        <p class="text-muted mb-4">{{ \Illuminate\Support\Str::limit($service->description, 60) }}</p>
                        <div class="mt-auto">
                            <a class="btn btn-outline-success rounded-pill py-2 px-4" 
                               href="{{ route('service.home') }}"
                               onclick="event.stopPropagation()">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-12">
                <a class="btn btn-primary rounded-pill py-3 px-5 mt-4" href="{{ route('service.home') }}">
                    View More Services
                </a>
            </div>
        </div>
    </div>
</div>