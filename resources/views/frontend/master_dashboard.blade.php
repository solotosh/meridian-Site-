<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
@php
    use App\Models\SeoData;

    $seo = SeoData::where('page', $page ?? 'home')->first();
@endphp

@if($seo)
<title>{{ $seo->meta_title }} - Meridian Mapping</title>
<meta name="description" content="{{ $seo->meta_description }} - Read more on Meridian Mapping blog">

    <meta name="keywords" content="{{ $seo->meta_keywords }}">
    <meta name="author" content="{{ $seo->meta_author }}">
    

@endif


    <meta name="csrf-token" content="{{ csrf_token() }}">

 
    
    
<title> @yield('title') </title>

<!-- Fav Icon -->
<link rel="icon" href="" type="image/x-icon">

<!-- Google Fonts -->
<!-- Montserrat Font from Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="{{asset('frontend/assets/css/font-awesome-all.css')}}" rel="stylesheet">
<link href="{{asset('frontend/assets/css/flaticon.css')}}" rel="stylesheet">
<link href="{{asset('frontend/assets/css/owl.css')}}" rel="stylesheet">
<link href="{{asset('frontend/assets/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('frontend/assets/css/jquery.fancybox.min.css')}}" rel="stylesheet">
<link href="{{asset('frontend/assets/css/animate.css')}}" rel="stylesheet">
<link href="{{asset('frontend/assets/css/jquery-ui.css')}}" rel="stylesheet">
<link href="{{asset('frontend/assets/css/nice-select.css')}}" rel="stylesheet">
<link href="{{asset('frontend/assets/css/color/theme-color.css')}}" id="jssDefault" rel="stylesheet">
<link href="{{asset('frontend/assets/css/switcher-style.css')}}" rel="stylesheet">
<link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
<link href="{{asset('frontend/assets/css/responsive.css')}}" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<style>
    .card {
      margin-bottom: 5px !important; /* reduce vertical space */
    }
  </style>

<style>
/* Floating Buttons Container */
.floating-buttons {
    position: fixed;
    bottom: 20px;
    left: 20px;
    z-index: 9999;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 15px; /* Increased gap between buttons */
  }

  /* Common styles for all buttons */
  .floating-buttons a,
  .floating-buttons .contact-toggle {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 12px 20px;
    border-radius: 50px;
    color: white;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    border: none;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    background-color: #007bff;
    transition: all 0.3s ease;
    width: 100%;
    min-width: 180px;
  }

  /* Button hover effects */
  .floating-buttons a:hover,
  .floating-buttons .contact-toggle:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.25);
  }

  /* Button active effects */
  .floating-buttons a:active,
  .floating-buttons .contact-toggle:active {
    transform: translateY(0);
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
  }

  /* Icon styles */
  .floating-buttons a i,
  .floating-buttons .contact-toggle i {
    font-size: 18px;
  }

  /* Button-specific background colors */
  .floating-buttons #whatsapp {
    background-color: #25d366;
  }
  .floating-buttons #call {
    background-color: #007bff;
  }
  .floating-buttons #callback {
    background-color: #6c757d;
  }
  .floating-buttons .contact-toggle {
    background-color: #343a40;
  }

  /* Contact options container */
  .contact-options {
    display: flex;
    flex-direction: column;
    gap: 15px; /* Consistent spacing between options */
    width: 100%;
  }

  /* Desktop: Show all options, hide contact toggle */
  @media (min-width: 768px) {
    .contact-toggle {
      display: none !important;
    }
    .contact-options {
      display: flex !important;
    }
  }

 /* Mobile: Hide options initially, show contact toggle */
@media (max-width: 767px) {
  .contact-options {
    display: none;
  }
  .floating-buttons.show .contact-options {
    display: flex;
  }
  .floating-buttons {
    gap: 10px; /* Slightly smaller gap on mobile */
  }

  /* Add an animation for showing the contact options */
  .floating-buttons.show .contact-options {
    animation: fadeIn 0.3s ease-out;
  }
}

/* Animation for mobile toggle */
@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

.modal {
  position: fixed;
  z-index: 2000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.6);
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-content {
  background-color: #fff;
  padding: 30px;
  border-radius: 12px;
  width: 300px;
  position: relative;
  box-shadow: 0 0 15px rgba(0,0,0,0.2);
}

.modal-content h3 {
  margin-top: 0;
}

.modal-content input {
  width: 100%;
  padding: 8px;
  margin: 10px 0;
}

.modal-content button {
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 6px;
  cursor: pointer;
}

.modal-content .close {
  position: absolute;
  top: 8px;
  right: 12px;
  font-size: 22px;
  cursor: pointer;
}
<style>
/* Adjust SweetAlert width for desktop screens */
@media (min-width: 768px) {
  .custom-swal-width {
    width: 400px !important;
  }
}
</style>

</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMvRxZ8atlhvZmkQmEr9U9CFE6iAKb8KZyTAA2" crossorigin="anonymous">
</head>



<!-- page wrapper -->
<body>

    <div class="boxed_wrapper">
  
<div class="floating-buttons" id="floating-buttons">
  <!-- Toggle button for mobile -->
  <button id="toggle-buttons" class="contact-toggle">
    <i class="fas fa-comments"></i> Contact Us
  </button>
  
  <!-- Contact options -->
  <div class="contact-options">
    <a href="tel:+254797169127" id="call">
      <i class="fas fa-phone-alt"></i> Call Now
    </a>
    <a href="https://wa.me/254797169127?text=Hello%20Admin,%20I%20am%20interested%20in%20your%20land%20surveying%20services.%20Can%20we%20book%20a%20call?" 
       id="whatsapp" 
       target="_blank">
      <i class="fab fa-whatsapp"></i> WhatsApp
    </a>
    <a href="javascript:void(0);" id="callback">
      <i class="fas fa-phone"></i> Request Callback
    </a>
  </div>
</div>



  


@include('frontend.body.header')
@include('frontend.body.switcher')
@include('frontend.body.mobile')

        <!-- subscribe-section end -->

        @yield('main')
        <!-- main-footer -->
        @include('frontend.body.footer')
        <!-- main-footer end -->




     
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if(session()->has('message'))
            var type = "{{ session('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ session('message') }}");
                    break;
        
                case 'success':
                    toastr.success("{{ session('message') }}");
                    break;
        
                case 'warning':
                    toastr.warning("{{ session('message') }}");
                    break;
        
                case 'error':
                    toastr.error("{{ session('message') }}");
                    break;
            }
        @endif
        </script>
        
    
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('toggle-buttons');
            const floatingButtons = document.getElementById('floating-buttons');
        
            // Toggle the contact options visibility on mobile
            if (toggleButton) {
              toggleButton.addEventListener('click', function(event) {
                // Prevent the click from propagating to the document
                event.stopPropagation();
                
                // Toggle the visibility of the floating buttons
                floatingButtons.classList.toggle('show');
              });
            }
        
            // Close the floating buttons if clicked outside
            document.addEventListener('click', function(event) {
              if (!floatingButtons.contains(event.target) && 
                  !event.target.classList.contains('contact-toggle')) {
                floatingButtons.classList.remove('show');
              }
            });
        
            // Prevent the toggle button from closing the floating buttons when clicked
            toggleButton.addEventListener('click', function(event) {
              event.stopPropagation();
            });
          });
        </script>
        
        
 <a href="javascript:void(0);" id="callback"><i class="fas fa-phone"></i> Request Callback</a>

 <!-- SweetAlert2 CDN -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
 <script>
   document.getElementById('callback').addEventListener('click', function () {
     Swal.fire({
       title: '📞 Request Callback',
       html:
         `<input type="text" id="swal-name" class="swal2-input" placeholder="Your Name" style="margin-bottom: 10px;">
          <input type="tel" id="swal-phone" class="swal2-input" placeholder="Phone Number">`,
       confirmButtonText: 'Submit Request',
       focusConfirm: false,
       customClass: {
         popup: 'custom-swal-width'
       },
       preConfirm: () => {
         const name = Swal.getPopup().querySelector('#swal-name').value.trim();
         const phone = Swal.getPopup().querySelector('#swal-phone').value.trim();
   
         // Regex for valid Kenyan phone numbers
         const phoneRegex = /^(?:\+254|0)(7\d{8}|11\d{7})$/;
   
         if (!name || !phone) {
           Swal.showValidationMessage(`Please enter both name and phone number`);
           return false;
         }
   
         if (!phoneRegex.test(phone)) {
           Swal.showValidationMessage(`Please enter a valid Kenyan phone number`);
           return false;
         }
   
         return { name, phone };
       }
     }).then((result) => {
       if (result.isConfirmed) {
         // Send data to backend
         fetch('/callback-request', {
           method: 'POST',
           headers: {
             'Content-Type': 'application/json',
             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
           },
           body: JSON.stringify(result.value)
         })
         .then(response => response.json())
         .then(data => {
           if (data.success) {
             Swal.fire(
               '✅ Request Received!',
               `Thanks, <strong>${result.value.name}</strong>. We’ll call you soon at <strong>${result.value.phone}</strong>.`,
               'success'
             );
           } else {
             Swal.fire(
               '❌ Error!',
               'Something went wrong. Please try again later.',
               'error'
             );
           }
         })
         .catch((error) => {
           Swal.fire(
             '❌ Error!',
             'Something went wrong. Please try again later.',
             'error'
           );
           console.error('Error:', error);
         });
       }
     });
   });
 </script>
 

  


    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-J4GHSP6EW0"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-J4GHSP6EW0');
</script>
    <!-- jequery plugins -->
    <script src="{{asset('frontend/assets/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/owl.js')}}"></script>
    <script src="{{asset('frontend/assets/js/wow.js')}}"></script>
    <script src="{{asset('frontend/assets/js/validation.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('frontend/assets/js/appear.js')}}"></script>
    <script src="{{asset('frontend/assets/js/scrollbar.js')}}"></script>
    <script src="{{asset('frontend/assets/js/isotope.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jQuery.style.switcher.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.paroller.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/nav-tool.js')}}"></script>
 
    <!-- main-js -->
    <script src="{{asset('frontend/assets/js/script.js')}}"></script>



</body>
</html>
