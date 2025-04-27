@extends('frontend.master_dashboard')

@section('main')
<style>

.breadcrumb-wrapper {
    max-width: 300px;
    margin: 0 auto;
}



</style>

<!-- Page Title -->
<section class="page-title centred pb-210" style="background-image: url({{ asset('frontend/assets/images/background/page-title.jpg') }});">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h4>{{ $service->title }}</h4>

            <!-- Start breadcrumb wrapper with smaller width -->
            <div class="breadcrumb-wrapper" style="max-width: 200px; margin: 0 auto;">
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ url('/') }}">Home</a></li>
                </ul>
            </div>
            <!-- End breadcrumb wrapper -->

        </div>
    </div>
</section>

<!-- End Page Title -->

<!-- Property Details -->
<section class="property-details property-details-four">
    <div class="auto-container">
        <div class="top-details clearfix">
            <div class="left-column pull-left clearfix">
                <h3>{{ $service->title }}</h3>
                <div class="author-info clearfix">
                    <div class="author-box pull-left">
                        @if($service->author_image)
                        <figure class="author-thumb"><img src="{{ asset($service->author_image) }}" alt=""></figure>
                        @endif
                        <h6>{{ $service->author_name }}</h6>
                    </div>
                </div>
            </div>
            <div class="right-column pull-right clearfix">
                <div class="price-inner clearfix">
                    <ul class="category clearfix pull-left">
                        <li><a href="#">{{ $service->category }}</a></li>
                        <li><a href="#">{{ $service->status }}</a></li>
                    </ul>
                    <div class="price-box pull-right">
                        <h3>{{ $service->price ?? '' }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <!-- Left Column (Main Content) -->
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="property-details-content">
                    <div class="discription-box content-widget">
                        <div class="title-box">
                            <h4>Service Description</h4>
                        </div>
                        <div class="text">
                            <p>{{ $service->description }}</p>
                        </div>
                        @if($service->image)
                        <figure class="image"><img src="{{ asset($service->image) }}" alt="{{ $service->title }}"></figure>
                        @endif
                    </div>

                    <!-- Related Services -->
                    <div class="similar-content mt-5">
                        <div class="title">
                            <h4>Related Services</h4>
                        </div>
                        <div class="row clearfix">
                            @php 
                                use Illuminate\Support\Str;
                                use App\Models\SurveyService;
                                $relatedServices = SurveyService::where('id', '!=', $service->id)->latest()->take(3)->get();
                            @endphp

                            @foreach($relatedServices as $related)
                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image">
                                                <img src="{{ asset($related->image) }}" alt="{{ $related->title }}">
                                            </figure>
                                            <div class="batch"><i class="{{ $related->icon ?? 'icon-11' }}"></i></div>
                                            <span class="category">{{ $related->category ?? 'Featured' }}</span>
                                        </div>
                                        <div class="lower-content">
                                            <div class="author-info clearfix">
                                                <div class="author pull-left">
                                                    <figure class="author-thumb">
                                                        <img src="{{ asset($related->author_image) }}" alt="{{ $related->author_name }}">
                                                    </figure>
                                                    <h6>{{ $related->author_name }}</h6>
                                                </div>
                                                <div class="buy-btn pull-right">
                                                    <a href="{{ $related->link ?? '#' }}">Learn More</a>
                                                </div>
                                            </div>
                                            <div class="title-text">
                                                <h4><a href="{{ route('service.detail', $related->id) }}">{{ $related->title }}</a></h4>
                                            </div>
                                            <p>{{ Str::limit($related->description, 80) }}</p>
                                            <div class="btn-box">
                                                <a href="{{ route('service.detail', $related->id) }}" class="theme-btn btn-two">See Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Related Services -->

                </div>
            </div>

            <!-- Right Column (Sidebar) -->
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="property-sidebar default-sidebar">
                    <div class="author-widget sidebar-widget">
                        <div class="author-box">
                            @if($service->author_image)
                            <figure class="author-thumb"><img src="{{ asset($service->author_image) }}" alt=""></figure>
                            @endif
                            <div class="inner">
                                <h4>{{ $service->author_name }}</h4>
                                <ul class="info clearfix">
                                    <li><i class="fas fa-map-marker-alt"></i> {{ $service->category ?? 'N/A' }}</li>
                                    <li><i class="fas fa-phone"></i><a href="#">+254 700 000000</a></li>
                                </ul>
                                <div class="btn-box"><a href="#">View Listings</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="company-info-widget sidebar-widget">
                        <div class="info-inner">
                            <div class="widget-title">
                                <h4>Meridian Mapping & Surveying</h4>
                            </div>
                            <div class="text">
                                <p>Meridian Mapping & Surveying Company is a leading surveying and mapping service provider based in Nairobi, Kenya. We specialize in:</p>
                                <ul class="list-style-two">
                                    <li>Land Surveying</li>
                                    <li>Topographical Mapping</li>
                                    <li>Boundary Identification</li>
                                    <li>GIS Services</li>
                                    <li>Engineering Surveys</li>
                                </ul>
                                <p>We deliver accurate, reliable, and timely services tailored to meet our clients’ specific project needs across Kenya and East Africa.</p>
                            </div>
                            <div class="btn-box">
                                <a href="{{ url('/contact') }}" class="theme-btn btn-two">Contact Us</a>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>

        </div>
    </div>
</section>
<!-- End Property Details -->

@endsection
