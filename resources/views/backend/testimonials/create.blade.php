
@extends('dashboard')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Testimonial /</span> Add Testimonial
    </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Designation</label>
                    <input type="text" name="designation" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-control" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" id="imageUpload" class="form-control" accept="image/*">
                    <div id="imagePreview" class="mt-2" style="max-width: 200px; display: none;">
                        <img id="previewImage" src="#" alt="Preview" class="img-fluid rounded" />
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('imageUpload').addEventListener('change', function(e) {
        const previewContainer = document.getElementById('imagePreview');
        const previewImage = document.getElementById('previewImage');

        if (!e.target.files || !e.target.files[0]) {
            previewContainer.style.display = 'none';
            return;
        }

        const reader = new FileReader();

        reader.onload = function(e) {
            previewImage.src = e.target.result;
            previewContainer.style.display = 'block';
        }

        reader.readAsDataURL(e.target.files[0]);
    });
</script>
@endsection
