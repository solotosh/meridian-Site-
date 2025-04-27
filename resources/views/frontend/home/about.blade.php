@php
    $about = \App\Models\About::latest()->first();
@endphp

@if($about)
<style>
    /* Theme Colors */
    :root {
        --dark-purple: #2a0a3a;
        --medium-purple: #6a3093;
        --light-purple: #b57edc;
        --luminous-green: #00ff88;
        --dark-green: #007944;
        --black: #7b01ee;
        --dark-gray: #ad08e0;
        --white: #ffffff;
        --light-text: #f0d9ff;
    }
    
    /* Main Background */
    .about {
        background-color: var(--dark-purple) !important;
        color: var(--light-text);
    }
    
    /* Buttons */
    .btn-success {
        background-color: var(--luminous-green) !important;
        border-color: var(--luminous-green) !important;
        color: var(--black) !important;
        font-weight: 600;
    }
    .btn-success:hover {
        background-color: var(--dark-green) !important;
        border-color: var(--dark-green) !important;
    }
    
    /* Icons */
    .text-success {
        color: var(--luminous-green) !important;
    }
    
    /* Text Colors */
    .text-primary {
        color: var(--light-purple) !important;
    }
    .text-dark {
        color: var(--light-text) !important;
    }
    
    /* Images */
    .about-img img {
        border: 3px solid var(--luminous-green) !important;
    }
    
    /* Customer Images */
    .btn-xl-square {
        border: 2px solid var(--luminous-green) !important;
        background-color: var(--black) !important;
    }
</style>

<div class="container-fluid about py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                <div class="about-img">
                    <img src="{{ asset($about->image_top ?? 'frontend/img/about-3.png') }}" class="img-fluid w-100 rounded-top bg-white" alt="Top Image">
                    <img src="{{ asset($about->image_bottom ?? 'frontend/img/about-2.jpg') }}" class="img-fluid w-100 rounded-bottom" alt="Bottom Image">
                </div>
            </div>
            <div class="col-lg-6 col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                <h4 class="text-primary">{{ $about->subheading ?? 'About Us' }}</h4>
                <h1 class="display-5 mb-4 text-white">{{ $about->heading }}</h1>
                <p class="text ps-4 mb-4">{{ $about->description }}</p>

                <div class="row g-4 justify-content-between mb-5">
                    <div class="col-lg-6 col-xl-5">
                        <p class="text-dark"><i class="fas fa-check-circle text-success me-1"></i> General Boundary Surveys</p>
                        <p class="text-dark mb-0"><i class="fas fa-check-circle text-success me-1"></i> Cadastral Surveys</p>
                    </div>
                    <div class="col-lg-6 col-xl-7">
                        <p class="text-dark"><i class="fas fa-check-circle text-success me-1"></i> Resurveys</p>
                        <p class="text-dark mb-0"><i class="fas fa-check-circle text-success me-1"></i>Subdivisions and amalgamations</p>
                    </div>
                </div>

                @php
                $customers = \App\Models\AboutCustomer::orderBy('position')->get();
                @endphp
            
                <div class="row g-4 justify-content-between mb-5">
                    <div class="col-xl-5">
                        <a href="#" class="btn btn-success rounded-pill py-3 px-5">Discover More</a>
                    </div>
                    <div class="col-xl-7 mb-5">
                        <div class="about-customer d-flex position-relative">
                            @foreach($customers->take(4) as $index => $customer)
                                <img 
                                    src="{{ asset('uploads/customers/' . $customer->image) }}" 
                                    alt="{{ $customer->alt }}" 
                                    class="img-fluid btn-xl-square position-absolute rounded-circle" 
                                    style="left: {{ 45 * $index }}px; top: 0; width: 40px; height: 40px;">
                            @endforeach
                    
                            @if($customers->last())
                                <div class="position-absolute text-white" style="left: {{ 45 * $customers->take(4)->count() + 40 }}px; top: 10px;">
                                    <p class="mb-0">{{ $customers->last()->label_top }}</p>
                                    <p class="mb-0">{{ $customers->last()->label_bottom }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                @include('frontend.home.counter')
            </div>
        </div>
    </div>
</div>
@endif