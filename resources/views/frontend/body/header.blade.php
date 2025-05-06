
        <!-- main header -->


        <style>
            /* Main header and sticky background */
            .main-header.header-style-two .header-lower,
            .sticky-header,
            .mobile-menu .menu-box {
              background-color: #2e2c2c !important;
            }
          
            /* Make nav links white */
            .main-header .navigation > li > a,
            .sticky-header .navigation > li > a,
            .mobile-menu .menu-box a {
              color: #fff !important;
            }
          
            /* Highlight active or hovered links */
            .main-header .navigation > li:hover > a,
            .main-header .navigation > li.current > a,
            .mobile-menu .menu-box a:hover {
              color: #9d0bf8 !important;
            }
          
            /* Optional: Make dropdowns black too */
            .main-header .navigation li ul {
              background-color: #2b2828;
            }
          
            .main-header .navigation li ul li a {
              color: #fff;
            }
          
            .main-header .navigation li ul li a:hover {
              color: #a306f7;
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
                                        
                                        <!-- Dropdown for Projects -->
                                        <li>
                                            <a href="{{ url('project') }}"><span>Projects</span></a>
                                            
                                        </li>
                                        
                                    
                                        <li><a href="{{ url('blog') }}"><span>Blog</span></a></li>
                                        <li><a href="{{ url('contact') }}"><span>Contact</span></a></li>
                                    </ul>
                                    
                                </div>
                            </nav>
                        </div>
                   
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="outer-box">
                    <div class="main-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="index.html"><img src="assets/images/logo.png" alt=""></a></figure>
                        </div>
                        <div class="menu-area clearfix">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                        <div class="btn-box">
                            <a href="{{ url('/') }}" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
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
