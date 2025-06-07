<style>
/* ===== Base Styles ===== */
.main-header.header-style-two .header-lower,
.sticky-header,
.mobile-menu .menu-box {
  background-color: #2e2c2c !important;
}

/* Navigation Links */
.main-header .navigation > li > a,
.sticky-header .navigation > li > a,
.mobile-menu .menu-box a {
  color: #fff !important;
}

/* Active/Hover States */
.main-header .navigation > li:hover > a,
.main-header .navigation > li.current > a,
.mobile-menu .menu-box a:hover {
  color: #9d0bf8 !important;
}

/* Dropdown Styles */
.main-header .navigation li ul {
  background-color: #2b2828;
}

.main-header .navigation li ul li a {
  color: #fff;
}

.main-header .navigation li ul li a:hover {
  color: #a306f7;
}

/* ===== Header Layout ===== */
.main-header.header-style-two .header-lower .outer-box {
  padding: 15px 0;
  background-color: #2e2c2c !important;
}

/* Logo Styles */
.main-header.header-style-two .logo-box {
  float: left;
  margin-right: 0;
  padding: 5px 0;
}

.main-header.header-style-two .logo-box img {
  height: 50px;
  width: auto;
  transition: all 0.3s ease;
}

/* Menu Area */
.main-header.header-style-two .menu-area {
  float: right;
  position: relative;
  display: flex;
  align-items: center;
  height: 100%;
  background-color: #2e2c2c !important;
}

/* ===== Burger Menu ===== */
.main-header.header-style-two .mobile-nav-toggler {
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 40px;
  height: 40px;
  cursor: pointer;
  z-index: 999;
  margin: 0;
  padding: 0;
  top: 0;
  background-color: transparent !important;
}

.main-header.header-style-two .mobile-nav-toggler .icon-bar {
  height: 2px;
  width: 30px;
  display: block;
  margin-bottom: 5px;
  background-color: #fff !important;
  transition: all 300ms ease;
}

.main-header.header-style-two .mobile-nav-toggler .icon-bar:last-child {
  margin-bottom: 0;
}

/* ===== Responsive Adjustments ===== */
@media (max-width: 991px) {
  /* Mobile Header */
  .main-header.header-style-two {
    position: relative;
    z-index: 999;
  }
  
  /* Logo and Burger Positioning */
  .main-header.header-style-two .header-lower {
    padding: 15px 0 10px;
  }
  
  .main-header.header-style-two .logo-box {
    position: relative;
    top: -5px; /* Move logo up slightly */
  }
  
  .main-header.header-style-two .mobile-nav-toggler {
    position: relative;
    top: -5px; /* Move burger up slightly */
  }
  
  /* Hide desktop menu */
  .main-header.header-style-two .main-menu {
    display: none;
  }
  
  /* Menu area spacing */
  .main-header.header-style-two .menu-area {
    margin-bottom: 15px;
  }
  
  /* Ensure dark background */
  .main-header.header-style-two .main-box {
    background-color: #2e2c2c !important;
  }
}

@media (min-width: 992px) {
  /* Desktop Styles */
  .main-header.header-style-two .mobile-nav-toggler {
    display: none;
  }
  
  .main-header.header-style-two .main-menu {
    display: block;
  }
  
  .main-header.header-style-two .logo-box img {
    height: 55px;
  }
}

/* ===== Mobile Menu Overlay ===== */
.mobile-menu {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 9999;
}

.mobile-menu .menu-backdrop {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.8);
}

.mobile-menu .menu-box {
  position: absolute;
  top: 0;
  left: 0;
  width: 300px;
  height: 100%;
  background: #2e2c2c;
  padding: 50px 30px;
  overflow-y: auto;
  transform: translateX(-100%);
  transition: transform 0.3s ease;
}

.mobile-menu.show .menu-box {
  transform: translateX(0);
}

.mobile-menu .close-btn {
  position: absolute;
  top: 20px;
  right: 20px;
  color: #fff;
  font-size: 20px;
  cursor: pointer;
  z-index: 1;
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
                <li ><a href="{{ url('project') }}"><span>Projects</span></a></li>
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
          <figure class="logo"><a href="{{ url('/') }}"><img src="assets/images/logo.png" alt=""></a></figure>
        </div>
        <div class="menu-area clearfix">
          <nav class="main-menu clearfix">
            <!--Keep This Empty / Menu will come through Javascript-->
          </nav>
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
    <div class="nav-logo"><a href="{{ url('/') }}"><img src="assets/images/logo-2.png" alt="" title=""></a></div>
    <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript--></div>
    <div class="contact-info">
      <h4>Contact Info</h4>
      <ul>
        <li></li>
        <li><a href="tel:+8801682648101"></a></li>
        <li><a href="mailto:info@example.com"></a></li>
      </ul>
    </div>
  </nav>
</div>