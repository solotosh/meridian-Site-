@php
    use App\Models\TeamMember;
    $teamMembers = TeamMember::latest()->get();
@endphp


<section class="team-section sec-pad centred">
    <div class="auto-container">
        <div class="sec-title">
            <h5>Our Team</h5>
            <h2>Meet Our Excellent Team</h2>
        </div>
        <div class="row clearfix">

            @foreach($teamMembers as $member)
                <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                    <div class="team-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img 
                                    src="{{ asset($member->image) }}" 
                                    alt="{{ $member->name }}" 
                                    style="width: 300px; height: 300px; object-fit: cover; border-radius: 8px;">
                            </figure>
                            
                            <div class="lower-content">
                                <div class="inner">
                                    <h4><a href="#">{{ $member->name }}</a></h4>
                                    <span class="designation">{{ $member->designation }}</span>
                                    <ul class="social-links clearfix">
                                        @if($member->facebook)
                                            <li><a href="{{ $member->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                        @endif
                                        @if($member->twitter)
                                            <li><a href="{{ $member->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                        @endif
                                        @if($member->whatsapp)
                                            <li><a href="{{ $member->whatsapp }}"><i class="fab fa-whatsapp"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
