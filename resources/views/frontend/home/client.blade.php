@php
    use App\Models\Partner;
    $partners = Partner::latest()->get();
@endphp

<section class="clients-section bg-color-1">
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/shape-1.png') }});"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12 title-column">
                <div class="sec-title">
                    <h5>Our Partners</h5>
                    <h2>We’re going to Became Partners for the Long Run.</h2>
                </div>
            </div>

            <div class="col-lg-8 col-md-12 col-sm-12 inner-column">
                <div class="clients-logo-wrapper">
                   

                    <!-- Scrollable Logo Container -->
                    <div class="clients-logo" id="logoScroller">
                        <ul class="logo-list">
                            @foreach($partners as $partner)
                                <li class="partner-card">
                                    <figure class="logo text-center mb-0">
                                        <a href="#">
                                            <img src="{{ asset($partner->image) }}" alt="{{ $partner->name }}" class="partner-logo">
                                        </a>
                                        <figcaption class="partner-caption">{{ $partner->name }}</figcaption>
                                    </figure>
                                </li>
                            @endforeach

                            @foreach($partners as $partner) <!-- Duplicate for looping -->
                                <li class="partner-card">
                                    <figure class="logo text-center mb-0">
                                        <a href="#">
                                            <img src="{{ asset($partner->image) }}" alt="{{ $partner->name }}" class="partner-logo">
                                        </a>
                                        <figcaption class="partner-caption">{{ $partner->name }}</figcaption>
                                    </figure>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Right Scroll Button -->
                  
                </div>
            </div>
        </div>
    </div>
</section>


