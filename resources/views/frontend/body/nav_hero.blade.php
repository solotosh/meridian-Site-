<style>
    /* Compact Navbar Styling */
    .navbar {
        padding: 0.5rem 0;
    }
    
    /* Logo styling */
    .navbar-brand {
        padding: 0;
        margin-right: 1rem;
    }
    
    .logo-img {
        max-height: 40px;  /* Control height instead of width */
        width: auto;
        object-fit: contain;
    }
    
    /* Nav items container */
    .navbar-collapse {
        flex-grow: 0;  /* Prevent excessive expansion */
    }
    
    /* Nav items */
    .navbar-nav {
        align-items: center;
    }
    
    .nav-link {
        padding: 0.5rem 0.8rem !important;
        font-size: 0.9rem;
        white-space: nowrap;  /* Prevent text wrapping */
    }
    
    /* Dropdown menu */
    .dropdown-menu {
        min-width: 200px;
        border: none;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }
    
    /* Button styling */
    .btn-primary {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
        white-space: nowrap;
    }
    
    /* Mobile responsiveness */
    @media (max-width: 992px) {
        .navbar {
            padding: 0.5rem 0;
        }
        
        .logo-img {
            max-height: 35px;
        }
        
        .navbar-toggler {
            padding: 0.25rem 0.5rem;
        }
        
        .navbar-collapse {
            padding: 1rem;
            background: white;
        }
        
        .navbar-nav .nav-item {
            margin: 0.25rem 0;
        }
        
        .btn-primary {
            margin-top: 0.5rem;
            width: 100%;
        }
    }
  </style>
  
  <div class="container-fluid sticky-top px-0">
    <div class="position-absolute bg-dark" style="left: 0; top: 0; width: 100%; height: 100%;"></div>
    <div class="container px-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-white py-2 px-3">
            @php
                use App\Models\LogoSetting;
                $logo = LogoSetting::first();
            @endphp
            
            <a href="{{ url('/') }}" class="navbar-brand p-0">
                @if($logo && $logo->logo)
                    <img src="{{ asset('uploads/logo/' . $logo->logo) }}" alt="Logo" class="logo-img">
                @else
                    <img src="{{ asset('frontend/img/logo.png') }}" alt="Logo" class="logo-img">
                @endif
            </a>
  
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarCollapse">
                @php
                    $mainMenuItems = \App\Models\Menu::with('children')
                        ->where('is_active', 1)
                        ->where('type', 'main')
                        ->whereNull('parent_id')
                        ->get();
                @endphp
                
                <div class="navbar-nav ms-auto py-0">
                    @foreach ($mainMenuItems as $item)
                        @if($item->children->count() > 0)
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ $item->name }}</a>
                                <div class="dropdown-menu bg-light m-0">
                                    @foreach ($item->children as $child)
                                        <a href="{{ url($child->url) }}" class="dropdown-item">{{ $child->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <a href="{{ url($item->url) }}" class="nav-item nav-link">{{ $item->name }}</a>
                        @endif
                    @endforeach
                </div>
                
                <div class="d-flex align-items-center flex-nowrap pt-xl-0 ms-2">
                    <button type="button" class="btn btn-primary rounded-pill text-white py-2 px-3" data-bs-toggle="modal" data-bs-target="#quoteModal">
                        Request for a quotation
                    </button>
                </div>
            </div>
        </nav>
    </div>
  </div>

<!-- Modal -->
<!-- Modal -->
<div class="modal fade @if ($errors->any()) show d-block @endif" id="quoteModal" tabindex="-1" aria-labelledby="quoteModalLabel" aria-hidden="true" style="@if ($errors->any()) display:block; @endif">
    <div class="modal-dialog modal-dialog-centered">
      <form method="POST" action="{{ route('quotation.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Request a Quotation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
  
          <div class="modal-body">
            <!-- Full Name -->
            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
  
            <!-- Email -->
            <div class="mb-3">
              <label class="form-label">Email Address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
  
            <!-- Phone -->
            <div class="mb-3">
              <label class="form-label">Phone Number</label>
              <input type="tel"
                class="form-control @error('phone') is-invalid @enderror"
                name="phone"
                value="{{ old('phone') }}"
                pattern="[0-9+()\- ]{10,15}"
                required
                title="Please enter a valid phone number">
              @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
  
            <!-- Title Deed Upload (Optional) -->
            <div class="mb-3">
              <label for="title_deed" class="form-label">Upload Title Deed <small class="text-muted">(optional)</small></label>
              <input type="file" class="form-control @error('title_deed') is-invalid @enderror" name="title_deed" id="title_deed" accept=".pdf,.jpg,.jpeg,.png">
              <div class="form-text">Accepted formats: PDF, JPG, PNG. Max size: 5MB.</div>
              @error('title_deed')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
  
          <div class="modal-footer">
            <button type="submit" class="btn btn-success w-100">Submit Request</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  



  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('#quoteModal form');
        const phoneInput = form.querySelector('input[name="phone"]');
    
        form.addEventListener('submit', function (e) {
            let rawPhone = phoneInput.value.trim();
    
            // Remove all non-numeric characters
            rawPhone = rawPhone.replace(/\D/g, '');
    
            // Normalize Kenyan formats
            if (rawPhone.startsWith('0')) {
                rawPhone = '254' + rawPhone.substring(1);
            } else if (rawPhone.startsWith('7') || rawPhone.startsWith('1')) {
                rawPhone = '254' + rawPhone;
            } else if (rawPhone.startsWith('254')) {
                // Do nothing — already in correct format
            }
    
            // Update the phone input value before submission
            phoneInput.value = rawPhone;
        });
    });
    </script>
    

@if ($errors->any())
<script>
  var myModal = new bootstrap.Modal(document.getElementById('quoteModal'));
  window.addEventListener('load', function () {
      myModal.show();
  });
</script>
@endif
<script>
setTimeout(() => {
    let alert = document.querySelector('.alert-success');
    if (alert) {
        alert.classList.remove('show');
        alert.classList.add('fade');
    }
}, 5000); // 5 seconds
</script>
