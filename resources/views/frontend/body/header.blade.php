<style>
    /* ===== Main Header Styles ===== */
    .main-header {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: #2e2c2c;
        transition: all 0.3s ease;
    }
    
    .header-container, .header-lower {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 5%;
        max-width: 1400px;
        margin: 0 auto;
    }
    
    .logo-box img {
        max-height: 50px;
        width: auto;
    }
    
    .main-menu {
        display: flex;
    }
    
    .navigation {
        display: flex;
        margin: 0;
        padding: 0;
        align-items: center;
    }
    
    .navigation li {
        list-style: none;
        margin: 0 15px;
        position: relative;
    }
    
    .navigation li a {
        color: #fff !important;
        text-decoration: none;
        transition: color 0.3s ease;
        font-weight: 500;
        padding: 5px 0;
    }
    
    .navigation li:hover a,
    .navigation li.current a {
        color: #9d0bf8 !important;
    }

    /* Sticky Header Styles */
    .sticky-header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1001;
        background-color: #2e2c2c;
        padding: 15px 5%;
        display: none;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    
    .sticky-header .main-box {
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 1400px;
        margin: 0 auto;
    }
    
    .sticky-header .navigation {
        display: flex;
        margin: 0;
        padding: 0;
        align-items: center;
    }
    
    .sticky-header .navigation li {
        list-style: none;
        margin: 0 15px;
    }
    
    .sticky-header .navigation li a {
        color: #fff !important;
    }

    /* Mobile menu styles */
    .mobile-nav-toggler {
        display: none;
        cursor: pointer;
        padding: 10px;
    }
    
    @media (max-width: 991px) {
        .mobile-nav-toggler {
            display: block;
        }
        
        .main-menu .navigation {
            display: none;
        }
        
        .sticky-header {
            display: none !important;
        }
    }
</style>

<header class="main-header header-style-two">
    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('frontend/assets/images/logo-light.png') }}" alt="Logo">
                        </a>
                    </figure>
                </div>
                
                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li><a href="{{ url('/') }}"><span>Home</span></a></li>
                                <li><a href="{{ url('about') }}"><span>About Us</span></a></li>
                                <li><a href="{{ url('service') }}"><span>Services</span></a></li>
                                <li><a href="{{ url('technology') }}"><span>Technology</span></a></li>
                                <li><a href="{{ url('project') }}"><span>Projects</span></a></li>
                                <li><a href="{{ url('blog') }}"><span>Blog</span></a></li>
                                <li><a href="{{ url('contact') }}"><span>Contact</span></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Sticky Header -->
    <div class="sticky-header">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('frontend/assets/images/logo-light.png') }}" alt="Logo">
                        </a>
                    </figure>
                </div>
                <div class="menu-area clearfix">
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix">
                            <ul class="navigation clearfix">
                                <li><a href="{{ url('/') }}"><span>Home</span></a></li>
                                <li><a href="{{ url('about') }}"><span>About Us</span></a></li>
                                <li><a href="{{ url('service') }}"><span>Services</span></a></li>
                                <li><a href="{{ url('technology') }}"><span>Technology</span></a></li>
                                <li><a href="{{ url('project') }}"><span>Projects</span></a></li>
                                <li><a href="{{ url('blog') }}"><span>Blog</span></a></li>
                                <li><a href="{{ url('contact') }}"><span>Contact</span></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="btn-box">
                    <a href="{{ url('/') }}" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>
    
    <nav class="menu-box">
        <div class="nav-logo"><a href="index.html"><img src="assets/images/logo-2.png" alt="" title=""></a></div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li></li>
                <li><a href="tel:+8801682648101"></a></li>
                <li><a href="mailto:info@example.com"></a></li>
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
            </ul>
        </div>
    </nav>
</div><!-- End Mobile Menu -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle functionality
    const mobileToggler = document.querySelector('.mobile-nav-toggler');
    const mobileMenu = document.querySelector('.mobile-menu');
    const closeBtn = document.querySelector('.mobile-menu .close-btn');

    // Open the mobile menu when the menu icon is clicked
    mobileToggler.addEventListener('click', function() {
        mobileMenu.classList.add('show');
        document.body.style.overflow = 'hidden';
    });

    // Close the mobile menu when the close button is clicked
    closeBtn.addEventListener('click', function() {
        mobileMenu.classList.remove('show');
        document.body.style.overflow = '';
    });

    // Sticky header functionality
    const mainHeader = document.querySelector('.main-header');
    const stickyHeader = document.querySelector('.sticky-header');
    const scrollThreshold = 100; // Adjust this value as needed

    // Clone navigation for sticky header
    const mainNav = document.querySelector('.header-lower .navigation');
    const stickyNav = document.querySelector('.sticky-header .navigation');
    if (mainNav && stickyNav) {
        stickyNav.innerHTML = mainNav.innerHTML;
    }

    window.addEventListener('scroll', function() {
        if (window.pageYOffset > scrollThreshold) {
            stickyHeader.style.display = 'block';
            mainHeader.style.opacity = '0';
            mainHeader.style.pointerEvents = 'none';
        } else {
            stickyHeader.style.display = 'none';
            mainHeader.style.opacity = '1';
            mainHeader.style.pointerEvents = 'auto';
        }
    });
});
</script>