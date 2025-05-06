@php
    use App\Models\Project;
    $projects = Project::latest()->take(12)->get();
@endphp

<section class="deals-style-two sec-pad">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5>Projects</h5>
            <h2>Our Projects</h2>
        </div>

        <div class="deals-carousel owl-carousel owl-theme dots-style-one owl-nav-none">
            @foreach($projects as $item)
            <div class="single-item">
                <div class="row clearfix">
                    <!-- Image Column -->
                    <div class="col-lg-6 col-md-6 col-sm-12 deals-block">
                        <div class="image-box">
                            <figure class="image">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                            </figure>
                            <div class="batch"><i class="{{ $item->icon ?? 'icon-11' }}"></i></div>
                            <span class="category">Project</span>
                            <div class="buy-btn">
                                <a href="{{ $item->link ?? '#' }}">View Project</a>
                            </div>
                        </div>
                    </div>

                    <!-- Content Column -->
                    <div class="col-lg-6 col-md-6 col-sm-12 deals-block">
                        <div class="deals-block-one">
                            <div class="inner-box">
                                <div class="lower-content">
                                    <div class="title-text">
                                        <h4><a href="{{ $item->link ?? '#' }}">{{ $item->title }}</a></h4>
                                    </div>
                                    <p>{{ \Illuminate\Support\Str::words($item->description, 70) }}</p>
                                    <div class="btn-box pull-left">
                                        <a href="{{ $item->link ?? '#' }}" class="theme-btn btn-one">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
