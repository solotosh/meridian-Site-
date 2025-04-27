@extends('frontend.master_dashboard')

@section('main')
<!-- Page Title -->
<section class="page-title centred" style="background-image: url({{ asset('assets/images/background/page-title.jpg') }});">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Frequently Asked Questions</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Frequently Asked Questions</li>
            </ul>
        </div>
    </div>
</section>

<!-- faq-page-section -->
<section class="faq-page-section sec-pad">
    <div class="auto-container">
        <div class="row clearfix">
            <!-- Left Column -->
            <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                <div class="faq-content-side">
                    <div class="sec-title">
                        <h5>FAQ’S</h5>
                        <h2>Frequently Asked Questions.</h2>
                        <p>Answers to some common questions asked by our clients.</p>
                    </div>

                    <ul class="accordion-box">
                        @foreach($faqs as $faq)
                        <li class="accordion block {{ $loop->first ? 'active-block' : '' }}">
                            <div class="acc-btn {{ $loop->first ? 'active' : '' }}">
                                <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                <h5>{{ $faq->question }}</h5>
                            </div>
                            <div class="acc-content {{ $loop->first ? 'current' : '' }}">
                                <div class="content-box">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Sidebar Column -->
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="faq-sidebar">
                    <div class="image-box text-center mb-4">
                        <figure class="m-0">
                            <img src="{{ asset('frontend/assets/images/resource/deed.jpg') }}" alt="FAQ Illustration" class="img-fluid rounded shadow w-100">
                        </figure>
                    </div>

                    <!-- Optional: Submit a Question Form -->
                    <div class="question-inner">
                        <div class="sec-title">
                            <h5>Submit Question</h5>
                            <h3>Ask Your Valuable Questions</h3>
                        </div>
                        <div class="form-inner">
                            <form action="{{ route('faq.message.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Your name" required="">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Your Email" required="">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" placeholder="Your message"></textarea>
                                </div>
                                <div class="form-group message-btn">
                                    <button type="submit" class="theme-btn btn-one">Send Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".acc-btn").forEach(function(button) {
            button.addEventListener("click", function() {
                const parent = this.closest(".accordion");
                const content = parent.querySelector(".acc-content");
                const allItems = document.querySelectorAll(".accordion");

                allItems.forEach(item => {
                    item.classList.remove("active-block");
                    item.querySelector(".acc-btn").classList.remove("active");
                    item.querySelector(".acc-content").classList.remove("current");
                });

                parent.classList.add("active-block");
                this.classList.add("active");
                content.classList.add("current");
            });
        });
    });
</script>


@endsection
