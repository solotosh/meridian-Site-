@extends('frontend.master_dashboard')

@section('main')


</style>
<!-- Page Title -->


<section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url('{{ asset('assets/images/shape/shape-9.png') }}');"></div>
        <div class="pattern-2" style="background-image: url('{{ asset('assets/images/shape/shape-10.png') }}');"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h6>About Us</h6>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</section>
{{-- <section class="page-title centred" style="background-image: url('{{ asset('assets/images/background/title.jpg') }}');">

    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>About Us</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</section> --}}
<!-- End Page Title -->

<!-- About Section -->
<section class="about-section about-page pb-0">
    <div class="auto-container">
        <div class="inner-container">
            <div class="row align-items-center clearfix">
                <div class="col-lg-6 image-column">
                    <div class="image_block_2">
                        <div class="image-box">
                            @if($about->image_top)
                                <figure class="image">
                                    {{-- {{ dd($about->image_top) }} --}}
                                    <img src="{{ asset($about->image_top) }}" alt="About Top Image">
                                </figure>
                            @endif
                            <div class="text wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <h2>{{ $about->highlight_number ?? '73' }}</h2>
                                <h4>{!! nl2br(e($about->highlight_text ?? 'Processed <br />Title Deeds')) !!}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 content-column">
                    <div class="content_block_3">
                        <div class="content-box">
                            <div class="sec-title">
                                <h5>{{ $about->subheading ?? 'About' }}</h5>
                                <h2>{{ $about->heading }}</h2>
                            </div>
                            <div class="text">
                                {!! nl2br(e($about->description)) !!}
                            </div>
                            <ul class="list clearfix">
                                <li>{{ $about->highlight_text ?? 'Trusted Professionals' }}</li>
                                <li>{{ $about->subheading ?? 'Customer-Focused Solutions' }}</li>
                            </ul>
                            <div class="btn-box">
                                <a href="{{ $about->link_url ?? url('/contact') }}" class="theme-btn btn-one">
                                    {{ $about->link_text ?? 'Contact With Me' }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($about->image_bottom)
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <img src="{{ asset($about->image_bottom) }}" alt="About Bottom Image" class="img-fluid">
                </div>
            </div>
            @endif

        </div>
    </div>
</section>
<!-- End About Section -->
<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@php
    use App\Models\AboutLandSurvey;

    $services = AboutLandSurvey::where('status', 'active')->latest()->get();
@endphp

<section class="feature-style-three centred pb-110">
    <div class="auto-container">
        <div class="sec-title">
            <h5>Our Services</h5>
            <h2>Meridian Services</h2>
        </div>

        <div class="three-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">
            @foreach($services as $service)
                <div class="feature-block-two">
                    <div class="inner-box">
                        <div class="icon-box">
                            <i class="{{ $service->icon_class ?? 'fas fa-tools' }}"></i>
                        </div>
                        <h4>{{ $service->title }}</h4>
                        <p>{{ $service->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>





        <!-- cta-section -->
        <section class="cta-section alternate-2 centred" style="background-image: url('assets/images/background/cta-1.jpg');">
            <div class="auto-container">
                <div class="inner-box clearfix">
                    <div class="text">
                        <h2>Who We Are</h2>
                        <p class="mt-2">
                            We are a team of expert surveyors and property consultants helping you navigate land, property, and planning solutions across Kenya.
                        </p>
                    </div>
                    <div class="btn-box mt-3">
                        <a href="{{ route('about.us') }}" class="theme-btn btn-one">Learn More</a>
                        <a href="{{ route('contact.home') }}" class="theme-btn btn-three">Contact Us</a>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- cta-section end -->


        <!-- funfact-section -->
        @php
    use App\Models\Funfact;
    $funfacts = Funfact::all(); // or you can limit: Funfact::take(4)->get();
@endphp

<section class="funfact-section centred">
    <div class="auto-container">
        <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
            <div class="row clearfix">
                @foreach($funfacts as $funfact)
                    <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                        <div class="funfact-block-one">
                            <div class="inner-box">
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="1500" data-stop="{{ $funfact->count }}">0</span>
                                </div>
                                <p>{{ $funfact->title }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

        <!-- funfact-section end -->


        <!-- testimonial-style-four -->
        @php
        use Illuminate\Support\Str;
        use App\Models\Testimonial; 
        $testimonials = Testimonial::latest()->get(); 
        @endphp
        
        
        <style>
            .testimonial-style-two .auto-container {
            max-width: 900px;
            margin: 0 auto;
            padding-left: 15px;
            padding-right: 15px;
        }
        
        </style>
        <section class="testimonial-style-two" style="background-image: url({{ asset('frontend/assets/images/background/testimonial-1.jpg') }});">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-xl-6 col-lg-12 col-md-12 offset-xl-6 inner-column">
                        <div class="single-item-carousel owl-carousel owl-theme dots-style-one owl-nav-none">
                            
                            @foreach($testimonials as $testimonial)
                            <div class="testimonial-block-two">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-18"></i></div>
                                    <div class="text">
                                        <h3>“{{ Str::limit($testimonial->message, 100) }}”</h3>
                                    </div>
                                    <div class="author-info">
                                        <figure class="author-thumb">
                                            <img 
                                                src="{{ asset($testimonial->image ?? 'frontend/assets/images/resource/default-user.png') }}" 
                                                alt="{{ $testimonial->name }}" 
                                                style="width: 70px; height: 70px; object-fit: cover; border-radius: 50%;">
                                        </figure>
                                        <h4>{{ $testimonial->name }}</h4>
                                        <span class="designation">{{ $testimonial->designation }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
        
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- testimonial-style-four end -->


       
    
      

        <!-- team-section -->
        @php
        use App\Models\TeamMember;
        $teamMembers = TeamMember::latest()->get();
    @endphp
    
    
    <section class="team-section sec-pad centred">
        <div class="auto-container">
            <div class="sec-title">
                <h5>Our Team</h5>
                <h2>Meet Our Excellent Team</h2>
            </div>
            <div class="row clearfix">
    
                @foreach($teamMembers as $member)
                    <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                        <div class="team-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img 
                                        src="{{ asset($member->image) }}" 
                                        alt="{{ $member->name }}" 
                                        style="width: 300px; height: 300px; object-fit: cover; border-radius: 8px;">
                                </figure>
                                
                                <div class="lower-content">
                                    <div class="inner">
                                        <h4><a href="#">{{ $member->name }}</a></h4>
                                        <span class="designation">{{ $member->designation }}</span>
                                        <ul class="social-links clearfix">
                                            @if($member->facebook)
                                                <li><a href="{{ $member->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                            @endif
                                            @if($member->twitter)
                                                <li><a href="{{ $member->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                            @endif
                                            @if($member->whatsapp)
                                                <li><a href="{{ $member->whatsapp }}"><i class="fab fa-whatsapp"></i></a></li>
                                            @endif
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
        <!-- team-section end -->







@endsection
