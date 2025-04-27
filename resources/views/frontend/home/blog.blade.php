@php
    use App\Models\Blog;
    use Illuminate\Support\Str;

    $blogs = Blog::latest()->take(10)->get();
    $categories = $blogs->pluck('category')->unique()->filter()->values();
@endphp


<!-- CSS & Lightbox -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<style>
.blog-item { transition: all 0.3s ease-in-out; }
.blog-item:hover { transform: translateY(-5px); box-shadow: 0 0.75rem 1.5rem rgba(0,0,0,0.05); }
.project-img img { transition: transform 0.3s ease; }
.project-img:hover img { transform: scale(1.05); }
.blog-plus-icon { position: absolute; bottom: 15px; right: 15px; }
</style>

<div class="container-fluid blog py-5 bg-light">
    <div class="container pb-5">
        <!-- Section Title -->
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h4 class="text-success text-uppercase mb-2">Our Blog</h4>
            <h2 class="fw-bold text-dark fs-2">Latest Articles & News</h2>
        </div>

        <!-- Category Filters -->
        <div class="text-center mb-4">
            <button class="btn btn-outline-dark btn-sm filter-btn active me-2" data-filter="all">All</button>
            @foreach($categories as $category)
                <button class="btn btn-outline-dark btn-sm filter-btn me-2" data-filter="{{ Str::slug($category) }}">
                    {{ $category }}
                </button>
            @endforeach
        </div>

        <!-- Blog Grid / Carousel Container -->
        <div class="row g-4 justify-content-center blog-list d-none d-md-flex">
            @foreach($blogs as $index => $blog)
            <div class="col-md-6 col-lg-6 col-xl-4 blog-item-box" data-category="{{ Str::slug($blog->category) }}">
                <div class="blog-item bg-white rounded p-4 shadow-sm h-100">
                    <div class="mb-4">
                        <h6 class="text-primary mb-2">{{ $blog->category ?? 'Uncategorized' }}</h6>
                        <div class="d-flex justify-content-between small text-muted">
                            <span><strong>On</strong> {{ \Carbon\Carbon::parse($blog->published_at)->format('M d, Y') }}</span>
                            <span><strong>By</strong> {{ $blog->author ?? 'Admin' }}</span>
                        </div>
                    </div>
                    <div class="project-img position-relative mb-3">
                        <img src="{{ asset($blog->image) }}" class="img-fluid w-100 rounded" alt="Blog Image">
                        <div class="blog-plus-icon">
                            <a href="{{ asset($blog->image) }}" data-lightbox="blog-{{ $blog->id }}" class="btn btn-primary btn-md-square rounded-circle">
                                <i class="fas fa-plus fa-sm"></i>
                            </a>
                        </div>
                    </div>
                    <h5 class="text-dark fw-semibold mb-3">{{ $blog->title }}</h5>
                    <a class="btn btn-outline-success rounded-pill py-2 px-4" href="#">Explore More</a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Mobile Carousel -->
        <div class="owl-carousel blog-carousel d-md-none">
            @foreach($blogs as $blog)
            <div class="blog-item bg-white rounded p-4 shadow-sm mx-2">
                <h6 class="text-primary mb-2">{{ $blog->category ?? 'Uncategorized' }}</h6>
                <div class="small text-muted mb-3"><strong>On</strong> {{ \Carbon\Carbon::parse($blog->published_at)->format('M d, Y') }} | <strong>By</strong> {{ $blog->author ?? 'Admin' }}</div>
                <div class="project-img mb-3">
                    <img src="{{ asset($blog->image) }}" class="img-fluid w-100 rounded" alt="Blog Image">
                </div>
                <h5 class="text-dark">{{ $blog->title }}</h5>
                <a class="btn btn-outline-success rounded-pill mt-3 px-4 py-2" href="#">Explore More</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Lightbox + OwlCarousel + Filters -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Filter logic
    const buttons = document.querySelectorAll(".filter-btn");
    const blogBoxes = document.querySelectorAll(".blog-item-box");

    buttons.forEach(btn => {
        btn.addEventListener("click", () => {
            buttons.forEach(b => b.classList.remove("active"));
            btn.classList.add("active");
            const category = btn.getAttribute("data-filter");

            blogBoxes.forEach(box => {
                if (category === "all" || box.getAttribute("data-category") === category) {
                    box.style.display = "block";
                } else {
                    box.style.display = "none";
                }
            });
        });
    });

    // Initialize mobile carousel
    $('.blog-carousel').owlCarousel({
        items: 1,
        margin: 16,
        loop: true,
        autoplay: true,
        autoplayTimeout: 4000,
        nav: false,
        dots: true
    });
});
</script>
