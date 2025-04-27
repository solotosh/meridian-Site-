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
