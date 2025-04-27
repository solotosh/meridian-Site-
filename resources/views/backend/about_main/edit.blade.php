@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">About /</span> Edit Entry</h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $about->heading }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Subheading</label>
                    <input type="text" name="subheading" class="form-control" value="{{ $about->subheading }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Top Image</label><br>
                    @if($about->image_top)
                        <img src="{{ asset($about->image_top) }}" class="mb-2" style="height: 60px;"><br>
                    @endif
                    <input type="file" name="image_top" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Bottom Image</label><br>
                    @if($about->image_bottom)
                        <img src="{{ asset($about->image_bottom) }}" class="mb-2" style="height: 60px;"><br>
                    @endif
                    <input type="file" name="image_bottom" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Highlight Number</label>
                    <input type="text" name="highlight_number" class="form-control" value="{{ $about->highlight_number }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Highlight Text</label>
                    <input type="text" name="highlight_text" class="form-control" value="{{ $about->highlight_text }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Link Button Text</label>
                    <input type="text" name="link_text" class="form-control" value="{{ $about->link_text }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Link URL</label>
                    <input type="text" name="link_url" class="form-control" value="{{ $about->link_url }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="5">{{ $about->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Update Entry</button>
            </form>
        </div>
    </div>
</div>

@endsection
