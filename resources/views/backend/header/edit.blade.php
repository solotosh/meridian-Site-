@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Settings /</span> Edit Header
    </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.header.update', $headerSetting->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" value="{{ old('address', $headerSetting->address) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Working Hours</label>
                    <input type="text" name="hours" value="{{ old('hours', $headerSetting->hours) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $headerSetting->phone) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email', $headerSetting->email) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Logo (250x80)</label>
                    <input type="file" name="logo" class="form-control">
                    @if($headerSetting->logo)
                        <img src="{{ asset($headerSetting->logo) }}" alt="Logo" width="100" class="img-thumbnail mt-2">
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Mobile Logo (180x60)</label>
                    <input type="file" name="mobile_logo" class="form-control">
                    @if($headerSetting->mobile_logo)
                        <img src="{{ asset($headerSetting->mobile_logo) }}" alt="Mobile Logo" width="100" class="img-thumbnail mt-2">
                    @endif
                </div>

                <h5 class="mt-4">Social Links</h5>
                @php $socials = json_decode($headerSetting->social_links, true); @endphp
                @foreach(['facebook', 'twitter', 'whatsapp'] as $platform)
                    <div class="mb-3">
                        <label class="form-label">{{ ucfirst($platform) }} URL</label>
                        <input type="text" name="social_links[{{ $platform }}]" value="{{ $socials[$platform] ?? '' }}" class="form-control">
                    </div>
                @endforeach

                <button type="submit" class="btn btn-success mt-3">
                    <i class="bx bx-save me-1"></i> Update Header
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
