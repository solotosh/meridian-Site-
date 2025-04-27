<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>
    
    @php
        $footer = \App\Models\Footer::first(); // assuming the model is named Footer
    @endphp

    <nav class="menu-box">
        <div class="nav-logo">
            @if($footer && $footer->logo)
                <a href="{{ url('/') }}">
                    <img src="{{ asset($footer->logo) }}" alt="Logo" title="Logo">
                </a>
            @endif
        </div>

        <div class="menu-outer">
            <!-- Menu will be populated via JS -->
        </div>

        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                @if($footer && $footer->address)
                    <li>{{ $footer->address }}</li>
                @endif
                @if($footer && $footer->phone)
                    <li><a href="tel:{{ $footer->phone }}">{{ $footer->phone }}</a></li>
                @endif
                @if($footer && $footer->email)
                    <li><a href="mailto:{{ $footer->email }}">{{ $footer->email }}</a></li>
                @endif
            </ul>
        </div>

        <div class="social-links">
            <ul class="clearfix">
                <li><a href="{{ url('/') }}"><span class="fab fa-twitter"></span></a></li>
                <li><a href="{{ url('/') }}"><span class="fab fa-facebook-square"></span></a></li>
                <li><a href="{{ url('/') }}"><span class="fab fa-pinterest-p"></span></a></li>
                <li><a href="{{ url('/') }}"><span class="fab fa-instagram"></span></a></li>
                <li><a href="{{ url('/') }}"><span class="fab fa-youtube"></span></a></li>
            </ul>
        </div>
    </nav>
</div>
