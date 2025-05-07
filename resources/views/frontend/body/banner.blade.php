<section class="banner-style-two centred">
    <div class="banner-carousel owl-theme owl-carousel owl-nav-none">
        @php
            $carousels = \App\Models\Carousel::all();
            //dd($carousels);
        @endphp

        @foreach($carousels as $carousel)
        <div class="slide-item">
         

            <div class="image-layer" style="background-image:url('{{ asset('uploads/carousel/' . $carousel->image) }}')"></div>
           

            <div class="auto-container text-{{ $carousel->alignment }}">
                <div class="content-box">
                    <h2>{{ $carousel->title }}</h2>
                    <p>{{ $carousel->description }}</p>
                    @if($carousel->button1_text || $carousel->button2_text)
                   
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
