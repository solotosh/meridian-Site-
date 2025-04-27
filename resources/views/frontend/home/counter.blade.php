@php
    $counters = \App\Models\AboutCounter::all();
@endphp

<style>
    .transition {
        transition: all 0.3s ease-in-out;
    }
    .transition:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.1);
    }
    </style>
    

<div class="row g-4 text-center align-items-stretch justify-content-center">
    @foreach($counters as $counter)
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div 
            class="rounded-4 p-4 h-100 shadow-sm transition" 
            style="background-color: {{ $counter->background_color == 'dark' ? '#212529' : 'var(--bs-' . $counter->background_color . ')'}};"
        >
            <!-- Counter Value -->
            <div class="d-flex align-items-center justify-content-center mb-2">
                <span 
                    class="counter-value display-6 fw-bold text-white me-1" 
                    data-toggle="counter-up"
                    style="font-size: 2.2rem;"
                >
                    {{ $counter->value }}
                </span>
                <span class="text-white fs-4 fw-semibold">{{ $counter->suffix }}</span>
            </div>

            <!-- Label -->
            <p class="mt-2 mb-0 fw-medium {{ $counter->background_color == 'dark' ? 'text-white' : 'text-dark' }}">
                {{ $counter->label }}
            </p>
        </div>
    </div>
    @endforeach
</div>
