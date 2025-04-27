@extends('frontend.master_dashboard')

@section('main')
<!-- Page Title -->
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
                <li>All Services</li>
            </ul>
        </div>
    </div>
</section>

<!-- Projects List -->
<section class="property-details property-details-one">
    <div class="auto-container">
        <div class="row clearfix">
            <!-- Loop through all projects -->
            @foreach($projects as $project)
            <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                <div class="feature-block-one wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <img src="{{ asset($project->image) }}" alt="{{ $project->title }}">
                            </figure>
                            <div class="batch"><i class="icon-11"></i></div>
                            <span class="category">{{ $project->tagline }}</span>
                        </div>
                        <div class="lower-content">
                            <div class="author-info clearfix">
                                <div class="author pull-left">
                                    <figure class="author-thumb">
                                        <img src="{{ asset($project->image) }}" alt="{{ $project->title }}">
                                    </figure>
                                    <h6>{{ $project->title }}</h6>
                                </div>
                                <div class="buy-btn pull-right">
                                    <!-- Link to project detail page -->
                                    <a href="{{ url('projects/' . $project->id) }}">See Details</a>
                                </div>
                            </div>
                            <div class="title-text">
                                <h4><a href="{{ url('project/' . $project->id) }}">{{ $project->title }}</a></h4>
                            </div>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($project->description), 100) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Similar Projects Section -->
<section class="similar-content py-5">
    <div class="auto-container">
        <div class="title">
            <h4>Similar Projects</h4>
        </div>
        <div class="row clearfix">
            <!-- Loop through similar projects -->
            @foreach($similar as $item)
            <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                <div class="feature-block-one wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                            </figure>
                            <div class="batch"><i class="icon-11"></i></div>
                            <span class="category">{{ $item->tagline }}</span>
                        </div>
                        <div class="lower-content">
                            <div class="author-info clearfix">
                                <div class="author pull-left">
                                    <figure class="author-thumb">
                                        <img src="{{ asset($item->author_image) }}" alt="{{ $item->author_name }}">
                                    </figure>
                                    <h6>{{ $item->author_name }}</h6>
                                </div>
                                <div class="buy-btn pull-right">
                                    <!-- Link to project detail page for similar project -->
                                    <a href="{{ url('projects/' . $item->id) }}">{{ $item->status }}</a>
                                </div>
                            </div>
                            <div class="title-text">
                                <h4><a href="{{ url('projects/' . $item->id) }}">{{ $item->title }}</a></h4>
                            </div>
                            <div class="price-box clearfix">
                                <div class="price-info pull-left"></div>
                                <ul class="other-option pull-right clearfix">
                                    <li>
                                        <a href="{{ url('projects/' . $item->id) }}"><i class="fas fa-map-marked-alt"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ url('projects/' . $item->id) }}"><i class="fas fa-crosshairs"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($item->description), 100) }}</p>
                            <div class="btn-box">
                                <a href="{{ url('projects/' . $item->id) }}" class="theme-btn btn-two">See Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
