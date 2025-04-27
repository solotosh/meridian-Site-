<style>

    /* === REFINEMENTS FOR COMPACT PLACE SECTION === */
.place-section {
  padding: 70px 0px 60px 0px;
}

.place-block-one .inner-box .text {
  padding: 10px 20px;
  left: 20px;
  bottom: 20px;
  width: calc(100% - 40px);
}

.place-block-one .inner-box .text h4 {
  font-size: 16px;
  line-height: 24px;
  margin-bottom: 2px;
}

.place-block-one .inner-box .text p {
  font-size: 13px;
  line-height: 20px;
}

.place-block-one .inner-box {
  margin-bottom: 20px;
}

</style>


<section class="faq-page-section sec-pad">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                <div class="faq-content-side">
                    <div class="sec-title">
                        <h5>FAQ’S</h5>
                        <h2>Frequently Asked Questions.</h2>
                        <p>Frequently Asked Questions.
                            Here you will find answers to common questions and helpful information.</p>
                    </div>
                    @php
    $faqs = \App\Models\Faq::latest()->take(3)->get();
@endphp

<ul class="accordion-box">
    <ul class="accordion-box">
        @foreach($faqs as $faq)
        <li class="accordion block">
            <div class="acc-btn">
                <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                <h5>{{ $faq->question }}</h5>
            </div>
            <div class="acc-content">
                <div class="content-box">
                    <p>{{ $faq->answer }}</p>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    
    <div class="btn-box text-center mt-4">
        <a href="{{ route('faq.page') }}" class="theme-btn btn-one">View All FAQs</a>
    </div>


                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="faq-sidebar">
                    <div class="image-box text-center">
                        <a href="{{ route('faq.page') }}">
                            <figure class="m-0">
                                <img 
                                    src="{{ asset('frontend/assets/images/resource/deed.jpg') }}" 
                                    alt="FAQ Illustration" 
                                    class="img-fluid rounded shadow w-100" 
                                    style="height: auto;">
                            </figure>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>