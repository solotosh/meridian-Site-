
  <!-- search-field-section -->

  @php
  use App\Models\AboutLandSurvey;


  $aboutLandSurveys = AboutLandSurvey::latest()->take(6)->get();
  use Illuminate\Support\Str; 

@endphp

<style>
    .sec-title {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;  /* Centers text horizontally */
    padding: 20px;       /* Optional: adds spacing around the container */
}

</style>


<section class="feature-style-two sec-pad">
    <div class="auto-container">
        <div class="sec-title">
            <h5>Services</h5>
            <h2>Land & Survey Highlights</h2>
        </div>

        

        <div class="three-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
            @foreach ($aboutLandSurveys as $item)
            <div class="feature-block-one">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><img src="{{ asset($item->image) }}" alt=""></figure>
                        <div class="batch"><i class="icon-11"></i></div>
                        <span class="category">{{ $item->category }}</span>
                    </div>
                    <div class="lower-content">
                        <div class="author-info clearfix">
                            <div class="author pull-left">
                                <figure class="author-thumb"><img src="{{ asset($item->author_image) }}" alt=""></figure>
                                {{-- <h6>{{ $item->author_name }}</h6> --}}
                            </div>
                            <div class="buy-btn pull-right">
                                <a href="{{ url('project/' . $item->id) }}">{{ $item->status }}</a>

                            </div>
                        </div>
                        <div class="title-text">
                            <h4><a href="{{ url('project/' . $item->id) }}">{{ $item->title }}</a></h4>
                     
                           
                            
                        </div>
                        <p>{{ Str::words($item->description, 12, '...') }}</p>
                        <div class="btn-box"><a href="{{ url('project/' . $item->id) }}" class="theme-btn btn-two">See Details</a></div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>

       
    </div>
</section>



