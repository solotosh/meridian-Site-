@php
    use App\Models\SurveyService;
    use Illuminate\Support\Str;

    $surveyServices = SurveyService::latest()->take(6)->get();
@endphp

<style>
    .sec-title {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 20px;
    }
</style>

<section class="feature-style-two sec-pad">
    <div class="auto-container">
        <div class="sec-title">
          
            <h2>OUR SERVICES</h2>
              <h5>Land & Survey Highlights</h5>
        </div>

        <div class="three-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
    @foreach ($surveyServices as $item)
        <a href="{{ route('service.detail', $item->id) }}" class="feature-block-one" style="display: block; color: inherit; text-decoration: none;">
            <div class="inner-box">
                <div class="image-box">
                    <figure class="image">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                    </figure>
                    <div class="batch"><i class="icon-11"></i></div>
                    <span class="category">{{ Str::words($item->short_des, 1, '') }}</span>
                </div>

                <div class="lower-content">
                    <div class="author-info clearfix">
                        <div class="author pull-left"></div>
                        <div class="buy-btn pull-right">
                            {{ Str::words($item->title, 1, '') }}
                        </div>
                    </div>

                    <div class="title-text">
                        <h4>{{ $item->title }}</h4>
                    </div>

                    <p>{{ Str::words($item->description, 12, '...') }}</p>

                    <span class="theme-btn btn-two">
                        {{ Str::words($item->title, 1, '') }} Details
                    </span>
                </div>
            </div>
        </a>
    @endforeach
</div>

    </div>
</section>
