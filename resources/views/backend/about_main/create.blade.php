@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">About /</span> Add Entry</h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Subheading</label>
                    <input type="text" name="subheading" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Top Image</label>
                    <input type="file" name="image_top" class="form-control" onchange="previewImage(event, 'top-preview')">
                    <img id="top-preview" src="#" alt="Top Image Preview" style="display:none; margin-top:10px; max-height:100px;">
                </div>

                <div class="mb-3">
                    <label class="form-label">Highlight Number</label>
                    <input type="text" name="highlight_number" class="form-control" placeholder="e.g. 20">
                </div>

                <div class="mb-3">
                    <label class="form-label">Highlight Text</label>
                    <input type="text" name="highlight_text" class="form-control" placeholder="e.g. Years of Experience">
                </div>

                <div class="mb-3">
                    <label class="form-label">Link Button Text</label>
                    <input type="text" name="link_text" class="form-control" placeholder="e.g. Contact With Me">
                </div>

                <div class="mb-3">
                    <label class="form-label">Link URL</label>
                    <input type="text" name="link_url" class="form-control" placeholder="e.g. /contact">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Save Entry</button>
            </form>
        </div>
    </div>
</div>

{{-- JS for image preview --}}
<script>
    function previewImage(event, previewId) {
        const input = event.target;
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById(previewId);
            output.src = reader.result;
            output.style.display = 'block';
        };
        if (input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection
