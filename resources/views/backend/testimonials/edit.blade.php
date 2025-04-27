@extends('dashboard')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Testimonial /</span> Edit Testimonial
    </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- REMOVE this line -->
                <!-- @method('PUT') -->

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Designation</label>
                    <input type="text" name="designation" class="form-control" value="{{ $testimonial->designation }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-control" rows="3" required>
                        {{ $testimonial->message }}
                    </textarea>
                </div>

                <div class="mb-3">
                    <label for="imageUpload" class="form-label">Upload Image</label>
                    <input type="file" name="image" id="imageUpload" class="form-control" accept="image/*">

                    @if($testimonial->image)
                        <div class="mt-2">
                            <strong>Current Image:</strong><br>
                            <img src="{{ asset($testimonial->image) }}" alt="Current Image" class="img-fluid rounded" style="max-width: 200px;">
                        </div>
                    @endif

                    <div id="imagePreview" class="mt-2" style="max-width: 200px; display: none;">
                        <img id="previewImage" src="#" alt="New Image Preview" class="img-fluid rounded" />
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Update Testimonial</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('imageUpload').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('imagePreview');
        const previewImage = document.getElementById('previewImage');

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewContainer.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            previewContainer.style.display = 'none';
            previewImage.src = '#';
        }
    });
</script>
@endsection
