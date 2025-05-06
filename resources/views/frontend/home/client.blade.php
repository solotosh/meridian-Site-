@php
    use App\Models\Partner;
    $partners = Partner::latest()->take(3)->get();
@endphp

<style>
    .clients-logo-wrapper {
        display: flex;
        justify-content: space-between;
        gap: 30px; /* Add space between partner logos */
        flex-wrap: wrap; /* Allow wrapping of content in smaller screens */
    }

    .partner-card {
        flex: 1 1 30%;  /* Make sure each card takes up to 33% of the container */
        display: flex;
        justify-content: center;
        align-items: center;
        max-width: 33%; /* Ensure that we display 3 items in the row */
        margin-bottom: 30px;  /* Space between rows */
        transition: transform 0.3s ease;  /* Smooth animation when scaling */
        border: 1px solid #ddd; /* Optional: Add border to each card */
        padding: 20px;  /* Padding for the cards */
        background-color: #fff; /* White background for the cards */
        box-shadow: 0px 4px 12px rgba(0,0,0,0.1); /* Add subtle shadow effect */
        border-radius: 8px;  /* Optional: rounded corners */
    }

    .partner-logo {
        max-width: 100%;  /* Increase logo size */
        width: 100%;
        height: auto;
        transition: transform 0.3s ease;  /* Add transition to the image */
    }

    .partner-logo:hover {
        transform: scale(1.1);  /* Scale the image slightly on hover */
    }

    .partner-caption {
        margin-top: 10px;
        font-size: 16px; /* Make caption font larger */
        font-weight: bold;
        color: #333;
        text-align: center;  /* Center the caption under the image */
    }

    /* For smaller screens, make it a single column */
    @media (max-width: 768px) {
        .partner-card {
            flex: 1 1 100%;  /* Take full width for mobile devices */
        }
    }
</style>

<section class="clients-section bg-color-1">
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/shape-1.png') }});"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12 title-column">
                <div class="sec-title">
                    <h5>Our Partners</h5>
                    <h2>We’re going to Become Partners for the Long Run.</h2>
                </div>
            </div>

            <div class="col-lg-8 col-md-12 col-sm-12 inner-column">
                <div class="clients-logo-wrapper">
                    <!-- Display Latest Partners without scrolling -->
                    @foreach($partners as $partner)
                        <div class="partner-card">
                            <figure class="logo text-center mb-0">
                                <a href="#">
                                    <img src="{{ asset($partner->image) }}" alt="{{ $partner->name }}" class="partner-logo">
                                </a>
                                <figcaption class="partner-caption">{{ $partner->name }}</figcaption>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
