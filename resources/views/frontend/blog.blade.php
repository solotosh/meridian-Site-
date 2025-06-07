@extends('frontend.master_dashboard')

@section('main')
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
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>More Blog</li>
            </ul>
        </div>
    </div>
</section>

<div class="container-fluid blog py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h4 class="text-primary">Our Blogs</h4>
            <h1 class="display-4">Latest Articles & News from the Blogs </h1>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($blogs as $index => $blog)
            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.{{ $index + 1 }}s">
                <div class="blog-item bg-light rounded shadow-sm p-4">
                    <div class="mb-4">
                        <h4 class="text-primary mb-2">{{ $blog->category ?? 'Uncategorized' }}</h4>
                        <div class="d-flex justify-content-between">
                            <p class="mb-0"><span class="text-dark fw-bold">On</span> {{ \Carbon\Carbon::parse($blog->published_date)->format('M d, Y') }}</p>
                            <p class="mb-0"><span class="text-dark fw-bold">By</span> {{ $blog->author ?? 'Admin' }}</p>
                        </div>
                    </div>
        
                    <!-- Image Section -->
                    <div class="project-img position-relative mb-4">
                        <!-- Link to blog detail page -->
                        <a href="{{ route('blog.show', $blog->id) }}">
                            <img src="{{ asset($blog->image ?? 'frontend/img/default.jpg') }}" class="img-fluid w-100 rounded" alt="Blog Image">
                        </a>
                    </div>
        
                    <!-- Title and description -->
                    <div class="my-4">
                        <a href="{{ route('blog.show', $blog->id) }}" class="h4 text-dark text-decoration-none">
                            {{ $blog->title }}
                        </a>
                        <p class="mt-2 text-muted">
                            {{ \Illuminate\Support\Str::words(strip_tags($blog->description), 50, '...') }}
                        </p>
                    </div>
        
                    <!-- Explore button -->
                    <a class="theme-btn btn-two" href="{{ route('blog.show', $blog->id) }}">
                        Explore More
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
@endpush

@endsection
