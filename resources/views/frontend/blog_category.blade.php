@extends('frontend.master_dashboard')

@section('main')

<!-- ✅ Dynamic Page Title -->
<section class="page-title centred" style="background-image: url({{ asset('assets/images/background/page-title-5.jpg') }});">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>{{ $formattedCategory }} Articles</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Category: {{ $formattedCategory }}</li>
            </ul>
        </div>
    </div>
</section>

<!-- ✅ Single Blog from Category (like detail page) -->
<section class="sidebar-page-container blog-details sec-pad-2">
    <div class="auto-container">
        <div class="row clearfix">

            <!-- Content Side -->
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="blog-details-content">
                    @if($blogs->count())
                    @php $blog = $blogs->first(); @endphp
                
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image">
                                    <img src="{{ asset($featured->image) }}" alt="{{ $featured->title }}">
                                </figure>
                                <span class="category">{{ $featured->category }}</span>
                            </div>
                            <div class="lower-content">
                                <h3>{{ $featured->title }}</h3>
                                <ul class="post-info clearfix">
                                    <li class="author-box">
                                        <figure class="author-thumb"><img src="{{ asset($featured->author_image) }}" alt="{{ $featured->author }}"></figure>
                                        <h5><a href="#">{{ $featured->author }}</a></h5>
                                    </li>
                                    <li>{{ \Carbon\Carbon::parse($featured->publish_date)->format('F d, Y') }}</li>
                                </ul>
                                <div class="text">
                                    {!! $featured->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <p>No blog posts found in this category.</p>
                @endif
                
                    
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="blog-sidebar">

                    <!-- ✅ Recent Posts -->
                    <div class="sidebar-widget post-widget">
                        <div class="widget-title"><h4>Recent Posts</h4></div>
                        <div class="post-inner">
                            @foreach($recentPosts as $post)
                            <div class="post">
                                <figure class="post-thumb">
                                    <a href="{{ route('blog.show', $post->slug) }}">
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                                    </a>
                                </figure>
                                <h5>
                                    <a href="{{ route('blog.show', $post->slug) }}">
                                        {{ \Illuminate\Support\Str::limit($post->title, 50) }}
                                    </a>
                                </h5>
                                <span class="post-date">{{ \Carbon\Carbon::parse($post->publish_date)->format('F d, Y') }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- ✅ Categories -->
                    <div class="sidebar-widget category-widget">
                        <div class="widget-title"><h4>Categories</h4></div>
                        <ul class="category-list clearfix">
                            @foreach($categories as $cat)
                            <li>
                                <a href="{{ route('blog.category', $cat) }}">
                                    {{ $cat }} <span>({{ App\Models\Blog::where('category', $cat)->count() }})</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
