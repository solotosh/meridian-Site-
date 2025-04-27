@php
use App\Models\Topbar;
$topbar = Topbar::first();
@endphp

@if($topbar)
<div class="container-fluid topbar px-0 d-none d-lg-block" style="font-size: 0.875rem;"> {{-- Reduced from default ~1rem to 0.875rem (14px) --}}
    <div class="container px-0">
        <div class="row gx-0 align-items-center" style="height: 45px;">
            <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                <div class="d-flex flex-wrap align-items-center"> {{-- Added align-items-center for better vertical alignment --}}
                    <a href="#" class="text-muted me-4 text-decoration-none"> {{-- Added text-decoration-none --}}
                        <i class="fas fa-map-marker-alt text-success me-2"></i>{{ $topbar->location ?? 'Find A Location' }}
                    </a>
                    <a href="tel:{{ $topbar->phone ?? '' }}" class="text-muted me-4 text-decoration-none">
                        <i class="fas fa-phone-alt text-success me-2"></i>{{ $topbar->phone ?? '+01234567890' }}
                    </a>
                    <a href="mailto:{{ $topbar->email ?? '' }}" class="text-muted me-0 text-decoration-none">
                        <i class="fas fa-envelope text-success me-2"></i>{{ $topbar->email ?? 'Example@gmail.com' }}
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-flex align-items-center justify-content-end">
                    @php
                        $socials = [
                            'facebook-f' => $topbar->facebook ?? '#',
                            'twitter' => $topbar->twitter ?? '#',
                            'instagram' => $topbar->instagram ?? '#',
                            'linkedin-in' => $topbar->linkedin ?? '#'
                        ];
                    @endphp
                    
                    @foreach($socials as $platform => $url)
                        <a href="{{ $url }}" class="btn btn-primary btn-square rounded-circle nav-fill me-2" style="width: 28px; height: 28px;"> {{-- Reduced button size --}}
                            <i class="fab fa-{{ $platform }} text-white" style="font-size: 0.75rem;"></i> {{-- Smaller icon size --}}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif