@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Settings /</span> Footer
    </h4>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Update Footer Content</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.footer.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">About Text</label>
                    <textarea name="about_text" class="form-control" rows="4" required>{{ old('about_text', $footer->about_text ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address', $footer->address ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $footer->phone ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $footer->email ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Copyright Text</label>
                    <input type="text" name="copyright" class="form-control" value="{{ old('copyright', $footer->copyright ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Footer Logo</label>
                    <input type="file" name="logo" id="logoUpload" class="form-control" accept="image/*">
                    @if(!empty($footer->logo))
                        <div class="mt-2">
                            <img src="{{ asset($footer->logo) }}" alt="Footer Logo" style="height: 50px;">
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update Footer</button>
            </form>
        </div>
    </div>
</div>

@endsection
