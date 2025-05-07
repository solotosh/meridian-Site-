@extends('frontend.master_dashboard')

@section('main')

<!-- Page Title -->
 <!--Page Title-->
 <section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url('{{ asset('assets/images/shape/shape-9.png') }}');"></div>
        <div class="pattern-2" style="background-image: url('{{ asset('assets/images/shape/shape-10.png') }}');"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h6>Blog</h6>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('technology.home') }}">Technology</a></li>
                <li>Technology</li>
            </ul>
        </div>
    </div>
</section>

<!-- Technology Details Section -->
<section class="agents-page-section pt-5 pb-5">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ asset($tech->image) }}" alt="{{ $tech->name }}" style="width:100%; height:auto; border-radius:10px;">
            </div>
            <div class="col-lg-6">
                <h2>{{ $tech->name }}</h2>
                <p class="text-muted mb-3">{{ $tech->short_description }}</p>
                <div>
                    <p>{!! nl2br(e($tech->long_description)) !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
