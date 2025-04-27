@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Slides /</span> Add Slide</h4>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add Carousel Slide</h5>
                    <small class="text-muted float-end">Slide details</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('carouselstore') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Slide Title" required />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Slide Description"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" id="imageInput" accept="image/*" required />
                            <div class="mt-3">
                                <img id="imagePreview" src="#" alt="Preview" style="display: none; max-height: 200px; border-radius: 8px;" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Button 1 Text</label>
                            <input type="text" name="button1_text" class="form-control" placeholder="Button 1 Text" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Button 1 Link</label>
                            <input type="text" name="button1_link" class="form-control" placeholder="https://example.com" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Button 2 Text</label>
                            <input type="text" name="button2_text" class="form-control" placeholder="Button 2 Text" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Button 2 Link</label>
                            <input type="text" name="button2_link" class="form-control" placeholder="https://example.com" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Text Alignment</label>
                            <select name="alignment" class="form-select">
                                <option value="left">Left</option>
                                <option value="center" selected>Center</option>
                                <option value="right">Right</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Slide</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Preview Script -->
<script>
    document.getElementById('imageInput').addEventListener('change', function (event) {
        const image = event.target.files[0];
        const preview = document.getElementById('imagePreview');
        
        if (image) {
            preview.src = URL.createObjectURL(image);
            preview.style.display = 'block';
        } else {
            preview.style.display = 'none';
        }
    });
</script>

@endsection
