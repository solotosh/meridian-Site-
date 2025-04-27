@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Slides /</span> Edit Slide</h4>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Carousel Slide</h5>
                    <small class="text-muted float-end">Slide details</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('carouselupdate',$slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                  

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" 
                                   value="{{ old('title', $slider->title) }}" required />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description', $slider->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Current Image</label>
                            <div class="mb-2">
                                <img src="{{ asset('uploads/carousel/'.$slider->image) }}" 
                                     alt="Current Image" style="max-height: 200px; border-radius: 8px;">
                            </div>
                            <label class="form-label">Change Image (Leave blank to keep current)</label>
                            <input type="file" name="image" class="form-control" id="imageInput" accept="image/*" />
                            <div class="mt-3">
                                <img id="imagePreview" src="#" alt="Preview" style="display: none; max-height: 200px; border-radius: 8px;" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Button 1 Text</label>
                            <input type="text" name="button1_text" class="form-control" 
                                   value="{{ old('button1_text', $slider->button1_text) }}" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Button 1 Link</label>
                            <input type="text" name="button1_link" class="form-control" 
                                   value="{{ old('button1_link', $slider->button1_link) }}" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Button 2 Text</label>
                            <input type="text" name="button2_text" class="form-control" 
                                   value="{{ old('button2_text', $slider->button2_text) }}" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Button 2 Link</label>
                            <input type="text" name="button2_link" class="form-control" 
                                   value="{{ old('button2_link', $slider->button2_link) }}" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Text Alignment</label>
                            <select name="alignment" class="form-select">
                                <option value="left" {{ old('alignment', $slider->alignment) == 'left' ? 'selected' : '' }}>Left</option>
                                <option value="center" {{ old('alignment', $slider->alignment) == 'center' ? 'selected' : '' }}>Center</option>
                                <option value="right" {{ old('alignment', $slider->alignment) == 'right' ? 'selected' : '' }}>Right</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Slide</button>
                        <a href="{{ route('allslider') }}" class="btn btn-secondary">Cancel</a>
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