<style>
/* ===== Banner Base Styles ===== */
.banner-style-two {
  position: relative;
  width: 100%;
  overflow: hidden;
}

.banner-carousel {
  width: 100%;
  height: 100%;
}

.slide-item {
  position: relative;
  height: 100vh;
  min-height: 500px;
  max-height: 1200px;
  display: flex;
  align-items: center;
}

.image-layer {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  z-index: 1;
}

.auto-container {
  position: relative;
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
  z-index: 2;
}

.content-box {
  padding: 25px 30px; /* Reduced padding to make box smaller */
  background-color: rgba(0, 0, 0, 0.5);
  border-radius: 8px;
  max-width: 600px; /* Reduced max-width to make box narrower */
  margin: 0 auto;
}

.content-box h2 {
  color: #fff;
  font-size: 2.5rem;
  font-weight: 700;
  margin-bottom: 15px; /* Reduced margin */
  line-height: 1.3;
}

.content-box p {
  color: #fff;
  font-size: 1.1rem; /* Slightly reduced font size */
  margin-bottom: 20px; /* Reduced margin */
  line-height: 1.5;
}

/* ===== Text Alignment Classes ===== */
.text-left .content-box {
  margin-left: 0;
  margin-right: auto;
}

.text-center .content-box {
  margin-left: auto;
  margin-right: auto;
}

.text-right .content-box {
  margin-left: auto;
  margin-right: 0;
}

/* ===== Button Container ===== */
.button-container {
  display: flex;
  gap: 15px;
  flex-wrap: wrap;
}

/* ===== Responsive Adjustments ===== */
@media (max-width: 991px) {
  .slide-item {
    height: 80vh;
    min-height: 400px;
  }
  
  .content-box {
    padding: 20px 25px; /* Adjusted padding */
    max-width: 500px; /* Adjusted width */
  }
  
  .content-box h2 {
    font-size: 2rem;
    margin-bottom: 12px;
  }
  
  .content-box p {
    font-size: 1rem;
    margin-bottom: 15px;
  }
}

@media (max-width: 767px) {
  .slide-item {
    height: 70vh;
    min-height: 350px;
  }
  
  .content-box {
    padding: 15px 20px;
    max-width: 90%; /* More width on mobile */
  }
  
  .content-box h2 {
    font-size: 1.8rem;
    margin-bottom: 10px;
  }
  
  .content-box p {
    font-size: 0.9rem;
    margin-bottom: 15px;
  }
  
  .button-container {
    flex-direction: column;
    gap: 10px;
  }
}

@media (max-width: 480px) {
  .slide-item {
    height: 60vh;
    min-height: 300px;
  }
  
  .content-box h2 {
    font-size: 1.5rem;
  }
  
  .content-box p {
    font-size: 0.85rem;
  }
}
</style>

<section class="banner-style-two centred">
    <div class="banner-carousel owl-theme owl-carousel owl-nav-none">
        @php
            $carousels = \App\Models\Carousel::all();
        @endphp

        @foreach($carousels as $carousel)
        <div class="slide-item">
            <div class="image-layer" style="background-image:url('{{ asset('uploads/carousel/' . $carousel->image) }}')"></div>
           
            <div class="auto-container text-{{ $carousel->alignment }}">
                <div class="content-box">
                    <h2 data-animation-in="fadeInUp">{{ $carousel->title }}</h2>
                    <p data-animation-in="fadeInUp" data-delay-in="0.3">{{ $carousel->description }}</p>
                    
                    @if($carousel->button1_text || $carousel->button2_text)
                    <div class="button-container">
                        @if($carousel->button1_text)
                        <a href="{{ $carousel->button1_link }}" class="theme-btn" data-animation-in="fadeInUp" data-delay-in="0.6">
                            {{ $carousel->button1_text }}
                        </a>
                        @endif
                        
                        @if($carousel->button2_text)
                        <a href="{{ $carousel->button2_link }}" class="theme-btn btn-style-two" data-animation-in="fadeInUp" data-delay-in="0.9">
                            {{ $carousel->button2_text }}
                        </a>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>