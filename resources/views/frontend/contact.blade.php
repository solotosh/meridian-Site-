@extends('frontend.master_dashboard')

@section('main')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Page Title -->
 <!--Page Title-->
 <section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url('{{ asset('frontend/assets/images/shape/shape-9.png') }}');"></div>
        <div class="pattern-2" style="background-image: url('{{ asset('frontend/assets/images/shape/shape-10.png') }}');"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h6>Contact Us</h6>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li></li>
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title -->

<!-- contact-info-section -->
<section class="contact-info-section sec-pad centred">
    <div class="auto-container">
        <div class="sec-title">
            <h5>Contact us</h5>
            <h2>Get In Touch</h2>
        </div>
        <div class="row clearfix">

            <!-- Email -->
            <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                <div class="info-block-one">
                    <div class="inner-box">
                        <div class="icon-box"><i class="icon-32"></i></div>
                        <h4>Email Address</h4>
                        <p>
                            <a href="mailto:{{ $contact->email ?? 'info@example.com' }}">{{ $contact->email ?? 'info@example.com' }}</a><br />
                            @if(!empty($contact->email2))
                                <a href="mailto:{{ $contact->email2 }}">{{ $contact->email2 }}</a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Phone -->
            <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                <div class="info-block-one">
                    <div class="inner-box">
                        <div class="icon-box"><i class="icon-33"></i></div>
                        <h4>Phone Number</h4>
                        <p>
                            <a href="tel:{{ $contact->phone ?? '+0725547867' }}">{{ $contact->phone ?? '+0725547867' }}</a><br />
                            @if(!empty($contact->phone2))
                                <a href="tel:{{ $contact->phone2 }}">{{ $contact->phone2 }}</a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Address -->
            <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                <div class="info-block-one">
                    <div class="inner-box">
                        <div class="icon-box"><i class="icon-34"></i></div>
                        <h4>Office Address</h4>
                        <p>{{ $contact->address ?? 'Nairobi, Kenya' }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- contact-info-section end -->

<!-- contact-section -->
<section class="contact-section bg-color-1">
    <div class="auto-container">
        <div class="row align-items-center clearfix">

            <!-- Contact Form -->
            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                <div class="content-box">
                    <div class="sec-title">
                        <h5>Contact</h5>
                        <h2>Contact Us</h2>
                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    </div>
                    <div class="form-inner">
                        <form method="post" action="{{ route('contact.message') }}" id="contact-form">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="username" placeholder="Your Name" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="email" name="email" placeholder="Email address" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="phone" placeholder="Phone" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="subject" placeholder="Subject" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea name="message" placeholder="Message" required></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                    <button class="theme-btn btn-one" type="submit" name="submit-form">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

      
        <div class="col-lg-6 col-md-12 col-sm-12 map-column">
           
            <div id="map" style="height: 400px;"></div>


        </div>
        

        </div>
    </div>
</section>
<!-- contact-section end -->






<script>
    // Initialize the map
    var map = L.map('map').setView([-1.4286747, 36.6879624], 17.75);
  
    // Add a tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors'
    }).addTo(map);
  
    // Add a marker
    L.marker([0.4693872, 35.2991658]).addTo(map)
      .bindPopup('Your Marker Popup Content');
  </script>
@endsection
