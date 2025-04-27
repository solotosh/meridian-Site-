@php
use App\Models\Footer;
use App\Models\Blog;

$footer = Footer::first();
$latestBlogs = Blog::latest()->take(2)->get();
@endphp

<footer class="main-footer">
    <div class="footer-top bg-color-2">
        <div class="auto-container">
            <div class="row clearfix">

                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget about-widget">
                        <div class="widget-title"><h3>About</h3></div>
                        <div class="text">
                            <p>{{ $footer->about_text }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget ml-70">
                        <div class="widget-title"><h3>Services</h3></div>
                        <div class="widget-content">
                            <ul class="links-list class">
                                <li><a href="{{ url('/about') }}">About Us</a></li>
                                <li><a href="{{ url('/technology') }}">Technology</a></li>
                              
                                <li><a href="{{ url('/service') }}">Our Services</a></li>
                                <li><a href="{{ url('/blog') }}">Our Blog</a></li>
                                <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget post-widget">
                        <div class="widget-title"><h3>Top News</h3></div>
                        <div class="post-inner">
                            @foreach($latestBlogs as $blog)
                            <div class="post">
                                <figure class="post-thumb">
                                    <a href="{{ route('blogs.show', $blog->slug) }}">
                                        <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" style="width: 60px;">
                                    </a>
                                </figure>
                                <h5><a href="{{ route('blogs.show', $blog->slug) }}">{{ \Illuminate\Support\Str::limit($blog->title, 35) }}</a></h5>
                                <p>{{ \Carbon\Carbon::parse($blog->publish_date)->format('M d, Y') }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget contact-widget">
                        <div class="widget-title"><h3>Contacts</h3></div>
                        <div class="widget-content">
                            <ul class="info-list clearfix">
                                <li><i class="fas fa-map-marker-alt"></i>{{ $footer->address }}</li>
                                <li><i class="fas fa-microphone"></i><a href="tel:{{ $footer->phone }}">{{ $footer->phone }}</a></li>
                                <li><i class="fas fa-envelope"></i><a href="mailto:{{ $footer->email }}">{{ $footer->email }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="auto-container">
            <div class="inner-box clearfix">
                <figure class="footer-logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset($footer->logo) }}" alt="Logo">
                    </a>
                </figure>
                <div class="copyright pull-left">
                    <p>{{ $footer->copyright }}</p>
                </div>
                <ul class="footer-nav pull-right clearfix">
                    <li><a href="{{ url('/terms') }}">Terms of Service</a></li>
                    <li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
