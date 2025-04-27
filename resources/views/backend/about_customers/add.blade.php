@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">About Customers /</span> Add Customer Icon</h4>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add Customer Image</h5>
                    <small class="text-muted float-end">Displayed in About Section</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('abcilentstore') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <inp<input type="file" name="images[]" class="form-control" id="imageInput" accept="image/*" multiple required />
                            <input type="file" name="images[]" class="form-control" id="imageInput" accept="image/*" multiple required />

                            <div class="mt-3">
                                <div class="mt-3 d-flex gap-2 flex-wrap" id="previewContainer"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alt Text (optional)</label>
                            <input type="text" name="alt" class="form-control" placeholder="e.g. Customer 1" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image Position (left offset in px)</label>
                            <input type="number" name="position" class="form-control" placeholder="e.g. 0, 45, 90..." />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Label Top (optional)</label>
                            <input type="text" name="label_top" class="form-control" placeholder="e.g. 5M+ Trusted" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Label Bottom (optional)</label>
                            <input type="text" name="label_bottom" class="form-control" placeholder="e.g. Global Customers" />
                        </div>

                        <button type="submit" class="btn btn-primary">Save Customer Icon</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Preview Script -->
<script>
    document.getElementById('imageInput').addEventListener('change', function (event) {
        const previewContainer = document.getElementById('previewContainer');
        previewContainer.innerHTML = ''; // Clear previous previews

        Array.from(event.target.files).forEach(file => {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.style.maxHeight = '100px';
            img.style.borderRadius = '8px';
            img.style.marginRight = '10px';
            img.classList.add('img-fluid');

            previewContainer.appendChild(img);
        });
    });
</script>


@endsection
