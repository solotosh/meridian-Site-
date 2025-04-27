@extends('frontend.master_dashboard')






@section('main')

<!-- Page Title -->
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

<!-- Blog Details -->
<section class="sidebar-page-container blog-details sec-pad-2">
    <div class="auto-container">
        <div class="row clearfix">

            <!-- Content Side -->
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="blog-details-content">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image">
                                    <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                                </figure>
                                <span class="category">{{ $blog->category }}</span>
                            </div>
                            <div class="lower-content">
                                <h3>{{ $blog->title }}</h3>
                                <ul class="post-info clearfix">
                                    <li class="author-box">
                                        <figure class="author-thumb"><img src="{{ asset($blog->author_image) }}" alt="{{ $blog->author }}"></figure>
                                        <h5><a href="#">{{ $blog->author }}</a></h5>
                                    </li>
                                    <li>{{ \Carbon\Carbon::parse($blog->publish_date)->format('F d, Y') }}</li>
                                </ul>
                                <div class="text">
                                    {!! $blog->content !!}
                                </div>
                                <div class="post-tags">
                                    <ul class="tags-list clearfix">
                                        <li><h5>Tags:</h5></li>
                                        <li><a href="#">Land</a></li>
                                        <li><a href="#">Surveying</a></li>
                                        <li><a href="#">Mapping</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Approved Comments -->
                    @if($comments->count())
                    <div class="comments-area mt-5">
                        <div class="group-title">
                            <h4>{{ $comments->count() }} Comment{{ $comments->count() > 1 ? 's' : '' }}</h4>
                        </div>
                        @foreach($comments as $comment)
                        <div class="comment-box mb-4">
                            <div class="comment-inner">
                                <div class="comment-info clearfix">
                                    <h5>{{ $comment->name }}</h5>
                                    <span>{{ $comment->created_at->format('F d, Y') }}</span>
                                </div>
                                <div class="text">
                                    <p>{{ $comment->message }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <!-- Comment Form -->
                    <div class="comments-form-area mt-5">
                        <div class="group-title"><h4>Leave a Comment</h4></div>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('blog.comment', $blog->slug) }}" method="POST" class="comment-form default-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 form-group">
                                    <input type="text" name="name" placeholder="Your name" required>
                                </div>
                                <div class="col-lg-6 col-md-6 form-group">
                                    <input type="email" name="email" placeholder="Your email" required>
                                </div>
                                <div class="col-lg-6 col-md-6 form-group">
                                    <input type="text" name="phone" placeholder="Phone number">
                                </div>
                                <div class="col-lg-6 col-md-6 form-group">
                                    <input type="text" name="subject" placeholder="Subject">
                                </div>
                                <div class="col-lg-12 form-group">
                                    <textarea name="message" placeholder="Your message" required></textarea>
                                </div>
                                <div class="col-lg-12 form-group message-btn">
                                    <button type="submit" class="theme-btn btn-one">Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="blog-sidebar">

                    <!-- Recent Posts -->
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
                                <span class="post-date">
                                    {{ \Carbon\Carbon::parse($post->publish_date)->format('F d, Y') }}
                                </span>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>

                    <!-- Categories -->
                  <!-- Categories -->
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
