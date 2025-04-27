@extends('frontend.master_dashboard')

@section('main')



<!-- preloader end -->


<!-- switcher menu -->

<!-- end switcher menu -->


<!-- main header -->

<!-- main-header end -->

<!-- Mobile Menu  -->

<!-- End Mobile Menu -->


<!-- banner-style-two -->
@include('frontend.body.banner')
<!-- banner-style-two end -->


@include('frontend.body.quote')

<!-- feature-style-two -->
@include('frontend.body.feature')
<!-- feature-style-two end -->


<!-- cta-section -->
@include('frontend.body.cta')
<!-- cta-section end -->


<!-- deals-style-two -->
@include('frontend.body.deal')
<!-- deals-style-two end -->


<!-- chooseus-section -->

@include('frontend.body.chooseus')
<!-- deals-style-two end -->
<!-- chooseus-section end -->


<!-- team-section -->

@include('frontend.home.team')
<!-- team-section end -->


<!-- testimonial-style-two -->
@include('frontend.home.testimonial')
<!-- testimonial-style-two end -->


<!-- place-style-two -->
@include('frontend.home.place')
<!-- place-style-two end -->


<!-- clients-section -->
@include('frontend.home.client')
<!-- clients-section end -->


<!-- news-section -->
@include('frontend.home.news')

<!-- news-section end -->


<!-- subscribe-section -->
@include('frontend.home.subscribe')






@endsection