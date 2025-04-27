@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Blogs /</span> Add New Blog</h4>

    <div class="card">
        <div class="card-header"><h5 class="mb-0">Blog Details</h5></div>
        <div class="card-body">
            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <input type="text" name="category" class="form-control" placeholder="e.g. Technology, Land, Real Estate">
                </div>

                <div class="mb-3">
                    <label class="form-label">Author <span class="text-danger">*</span></label>
                    <input type="text" name="author" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Publish Date <span class="text-danger">*</span></label>
                    <input type="date" name="publish_date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Excerpt (Short Description)</label>
                    <textarea name="excerpt" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Content (Full Blog Body)</label>
                    <textarea name="content" class="form-control" rows="6"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Main Blog Image</label>
                    <input type="file" name="image" id="imageUpload" class="form-control" accept="image/*">
                    <div id="imagePreview" class="mt-3" style="display: none;">
                        <img id="previewImage" src="#" alt="Preview" class="img-thumbnail" style="max-height: 100px;">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Author Image</label>
                    <input type="file" name="author_image" id="authorImageUpload" class="form-control" accept="image/*">
                    <div id="authorImagePreview" class="mt-3" style="display: none;">
                        <img id="previewAuthorImage" src="#" alt="Preview" class="img-thumbnail" style="max-height: 100px;">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save Blog</button>
            </form>
        </div>
    </div>
</div>

{{-- Image Preview Script --}}
<script>
    function previewFile(inputId, previewContainerId, previewImageId) {
        const input = document.getElementById(inputId);
        const container = document.getElementById(previewContainerId);
        const image = document.getElementById(previewImageId);

        input.addEventListener('change', function (e) {
            if (!e.target.files || !e.target.files[0]) {
                container.style.display = 'none';
                return;
            }

            const reader = new FileReader();
            reader.onload = function (e) {
                image.src = e.target.result;
                container.style.display = 'block';
            };
            reader.readAsDataURL(e.target.files[0]);
        });
    }

    previewFile('imageUpload', 'imagePreview', 'previewImage');
    previewFile('authorImageUpload', 'authorImagePreview', 'previewAuthorImage');
</script>

@endsection

