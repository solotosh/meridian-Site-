@extends('frontend.master_dashboard')

@section('main')

<style>
   /* Container width (already OK) */
.testimonial-style-two .auto-container {
    max-width: 900px;
    margin: 0 auto;
    padding-left: 15px;
    padding-right: 15px;
}

/* Compact testimonial section with slightly more padding */
.compact-testimonial {
    padding: 60px 0; /* slightly more vertical space */
}

/* Testimonial card */
.compact-testimonial .testimonial-block-two .inner-box {
    padding: 30px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 10px;
    box-shadow: 0 0 12px rgba(0, 0, 0, 0.08);
}

/* Testimonial message */
.compact-testimonial .testimonial-block-two .text h3 {
    font-size: 18px;
    line-height: 1.5;
    margin-bottom: 15px;
    max-height: 80px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* Author info */
.compact-testimonial .author-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

/* Author image */
.compact-testimonial .author-thumb img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
}

/* Author name */
.compact-testimonial .author-info h4 {
    font-size: 15px;
    font-weight: 600;
    margin-bottom: 3px;
}

/* Author designation */
.compact-testimonial .author-info .designation {
    font-size: 13px;
    color: #666;
}


</style>
<section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url('{{ asset('assets/images/shape/shape-9.png') }}');"></div>
        <div class="pattern-2" style="background-image: url('{{ asset('assets/images/shape/shape-10.png') }}');"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h6>All Services</h6>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>All Services </li>
            </ul>
        </div>
    </div>
</section>


        {{-- <section class="page-title centred" style="">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Our Services</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Our Services</li>
                    </ul>
                </div>
            </div>
        </section> --}}



       <!-- feature-style-three -->
<section class="feature-style-three service-page centred">
    <div class="auto-container">
        <div class="row clearfix">
            @foreach($services as $index => $service)
            <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                <!-- Wrap the entire block inside an anchor tag -->
                <a href="{{ route('service.detail', $service->id) }}" class="feature-block-link">
                    <div class="feature-block-two wow fadeInUp animated" 
                        data-wow-delay="{{ $index * 300 }}ms" 
                        data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="icon-box"><i class="{{ $service->icon }}"></i></div>
                            <h4>{{ $service->title }}</h4>
                            <p>{{ \Illuminate\Support\Str::limit($service->short_des, 100) }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

        
        <!-- feature-style-three end -->


        <!-- testimonial-style-two -->
        {{-- <section class="testimonial-style-two compact-testimonial" style="background-image: url('{{ asset('assets/images/background/testimonial-1.jpg') }}');">

            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-xl-6 col-lg-12 col-md-12 offset-xl-6 inner-column">
                        <div class="single-item-carousel owl-carousel owl-theme dots-style-one owl-nav-none">
                            @foreach($testimonials as $item)
                            <div class="testimonial-block-two">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-18"></i></div>
                                    <div class="text">
                                        <h3>“{{ $item->message }}”</h3>
                                    </div>
                                    <div class="author-info">
                                        <figure class="author-thumb">
                                            <img src="{{ asset($item->image) }}" alt="">
                                        </figure>
                                        <h4>{{ $item->name }}</h4>
                                        <span class="designation">{{ $item->designation }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        
        <!-- testimonial-style-two end -->


        <!-- team-section -->
        {{-- <section class="team-section sec-pad centred">
            <div class="auto-container">
                <div class="sec-title">
                    <h5>Our Agents</h5>
                    <h2>Meet Our Excellent Staffs</h2>
                </div>
                <div class="row clearfix">
                    @foreach($teamMembers as $index => $member)
                    <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                        <div class="team-block-one wow fadeInUp animated" data-wow-delay="{{ $index * 300 }}ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><img src="{{ asset($member->image) }}" alt=""></figure>
                                <div class="lower-content">
                                    <div class="inner">
                                        <h4><a href="#">{{ $member->name }}</a></h4>
                                        <span class="designation">{{ $member->designation }}</span>
                                        <ul class="social-links clearfix">
                                            <li><a href="{{ $member->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="{{ $member->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="https://wa.me/{{ $member->whatsapp }}"><i class="fab fa-whatsapp"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
         --}}
        <!-- team-section end -->





@endsection
