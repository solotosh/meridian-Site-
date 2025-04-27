@php
use App\Models\Blog;
use Illuminate\Support\Str;

$blogs = Blog::latest()->take(3)->get();
@endphp

<section class="news-section sec-pad">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5>News & Article</h5>
            <h2>Latest Updates and Insights</h2>
            <p>Stay informed with industry trends, insights, and company highlights  delivered weekly.</p>
        </div>

        <div class="row clearfix">
            @foreach($blogs as $index => $blog)
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated"
                     data-wow-delay="{{ $index * 300 }}ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ route('blog.show', $blog->slug) }}">
                                    <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" style="width: 100%; height: auto;">
                                </a>
                            </figure>
                            <span class="category">{{ $blog->category ?? 'News' }}</span>
                        </div>
                        <div class="lower-content">
                            <h4>
                                <a href="{{ route('blog.show', $blog->slug) }}">
                                    {{ Str::limit($blog->title, 50) }}
                                </a>
                            </h4>
                            <ul class="post-info clearfix">
                                <li class="author-box">
                                    <figure class="author-thumb">
                                        <img src="{{ asset($blog->author_image) }}" alt="{{ $blog->author }}">
                                    </figure>
                                    <h5><a href="#">{{ $blog->author }}</a></h5>
                                </li>
                                <li>{{ \Carbon\Carbon::parse($blog->publish_date)->format('F d, Y') }}</li>
                            </ul>
                            <div class="text">
                                <p>{{ Str::limit($blog->excerpt, 10) }}</p>
                            </div>
                            <div class="btn-box">
                                <a href="{{ route('blog.show', $blog->slug) }}" class="theme-btn btn-two">See Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
