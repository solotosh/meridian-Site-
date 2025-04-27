@php
    use App\Models\SurveyService;

    $deals = SurveyService::latest()->take(6)->get();
@endphp

<section class="deals-style-two sec-pad">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5>Projects</h5>
            <h2>Our Projects</h2>
        </div>

        <div class="deals-carousel owl-carousel owl-theme dots-style-one owl-nav-none">
            @foreach($deals as $item)
            <div class="single-item">
                <div class="row clearfix">
                    <!-- Image Column -->
                    <div class="col-lg-6 col-md-6 col-sm-12 deals-block">
                        <div class="image-box">
                            <figure class="image">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                            </figure>
                            <div class="batch"><i class="{{ $item->icon ?? 'icon-11' }}"></i></div>
                            <span class="category">Featured</span>
                            <div class="buy-btn">
                                <a href="{{ $item->link ?? '#' }}">{{ $item->status ?? 'Read More' }}</a>
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
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            {{-- <h6>Start From</h6>
                                            <h4>{{ $item->price ?? '$0.00' }}</h4> --}}
                                        </div>
                                        @if ($item->author_image || $item->author_name)
                                        <div class="author-box pull-right">
                                            <figure class="author-thumb">
                                                <img src="{{ asset($item->author_image ?? 'assets/images/feature/author-1.jpg') }}" alt="">
                                                <span>{{ $item->author_name ?? 'Admin' }}</span>
                                            </figure>
                                        </div>
                                        @endif
                                    </div>
                                    <p>{{ $item->short_des }}</p>

                                    {{-- <ul class="more-details clearfix">
                                        <li><i class="icon-14"></i>{{ $item->beds ?? 'N/A' }} Beds</li>
                                        <li><i class="icon-15"></i>{{ $item->baths ?? 'N/A' }} Baths</li>
                                        <li><i class="icon-16"></i>{{ $item->size ?? 'N/A' }} Sq Ft</li>
                                    </ul> --}}

                                    <div class="other-info-box clearfix">
                                        <div class="btn-box pull-left">
                                            <a href="{{ route('service.detail', $item->id) }}" class="theme-btn btn-one">See Details</a>

                                        </div>
                                        <ul class="other-option pull-right clearfix">
                                            <li>
                                                <a href="#">
                                                    <i class="bi bi-geo-alt-fill"></i> <!-- Landmark -->
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bi bi-compass"></i> <!-- Surveying compass -->
                                                </a>
                                            </li>
                                        </ul>
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
