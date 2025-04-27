<div class="header-carousel owl-carousel">
    @foreach(\App\Models\Carousel::all() as $carousel)
    <div class="header-carousel-item">
        <div class="header-carousel-item-img">
            <img src="{{ asset('uploads/carousel/' . $carousel->image) }}" class="img-fluid w-100" alt="Image">
        </div>
        <div class="carousel-caption">
            <div class="carousel-caption-inner text-{{ $carousel->alignment }} p-3">
                <h1 class="display-1 text-capitalize text-white mb-4">{{ $carousel->title }}</h1>
                <p class="mb-5 fs-5">{{ $carousel->description }}</p>

                @if($carousel->button1_text)
                    <a class="btn btn-primary rounded-pill py-3 px-5 mb-4 me-4" href="{{ $carousel->button1_link }}">
                        {{ $carousel->button1_text }}
                    </a>
                @endif

                @if($carousel->button2_text)
                    <a class="btn btn-dark rounded-pill py-3 px-5 mb-4" href="{{ $carousel->button2_link }}">
                        {{ $carousel->button2_text }}
                    </a>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
