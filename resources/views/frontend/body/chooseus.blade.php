@php
    use App\Models\ChooseUsReason;
    $reasons = ChooseUsReason::latest()->take(3)->get();
@endphp

<section class="chooseus-section alternate-2 bg-color-1">
    <div class="auto-container">
        <div class="upper-box clearfix">
            <div class="sec-title">
                <h5>Why Choose Us?</h5>
                <h2>Reasons To Choose Us</h2>
            </div>
            <div class="btn-box">
                <a href="{{ url('service') }}" class="theme-btn btn-one">All Services</a>
            </div>
        </div>

        <div class="lower-box">
            <div class="row clearfix">
                @foreach($reasons as $reason)
                    <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                        <div class="chooseus-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="{{ $reason->icon_class }}"></i></div>
                                <h4>{{ $reason->title }}</h4>
                                <p>{{ $reason->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
