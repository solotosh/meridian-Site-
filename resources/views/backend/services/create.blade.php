@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Services /</span> Add Service</h4>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Service Details</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.survey.services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required />
                </div>

                <div class="mb-3">
                    <label class="form-label">Icon Class (FontAwesome)</label>
                    <input type="text" name="icon" class="form-control" placeholder="e.g. fas fa-ruler" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Short Description</label>
                    <textarea name="short_des" class="form-control" rows="2"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Full Description</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Link</label>
                    <input type="text" name="link" class="form-control" placeholder="e.g. /services/boundary-survey" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" id="imageUpload" class="form-control" accept="image/*" />
                    <div id="imagePreview" class="mt-2" style="max-width: 200px; display: none;">
                        <img id="previewImage" src="#" alt="Preview" class="img-fluid rounded" />
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save Service</button>
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

