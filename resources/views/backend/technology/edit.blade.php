@extends('dashboard')
@section('main')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Edit Technology</h4>
        <a href="{{ route('technologies.index') }}" class="btn btn-secondary">Back to List</a>
    </div>

    <form action="{{ route('technologies.update', $technology->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Technology Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $technology->name) }}" required>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Short Description -->
        <div class="mb-3">
            <label for="short_description" class="form-label">Short Description</label>
            <input type="text" name="short_description" id="short_description"
                   class="form-control @error('short_description') is-invalid @enderror"
                   value="{{ old('short_description', $technology->short_description) }}" required>
            @error('short_description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Long Description -->
        <div class="mb-3">
            <label for="long_description" class="form-label">Long Description</label>
            <textarea name="long_description" id="long_description"
                      class="form-control @error('long_description') is-invalid @enderror"
                      rows="6">{{ old('long_description', $technology->long_description) }}</textarea>
            @error('long_description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Change Image (optional)</label><br>
            @if($technology->image)
                <img src="{{ asset($technology->image) }}" width="100" class="mb-2" style="border:1px solid #ccc; padding:3px;">
            @endif
            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
            @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Image Preview (JS) -->
        <div class="mb-3" id="imagePreviewContainer" style="display: none;">
            <label class="form-label">New Preview:</label><br>
            <img id="imagePreview" src="#" alt="Preview" style="max-width: 250px; height: auto; border: 1px solid #ccc;">
        </div>

        <button type="submit" class="btn btn-primary">Update Technology</button>
    </form>
</div>

<!-- JS for Image Preview -->
<script>
    document.getElementById('image').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');
        const container = document.getElementById('imagePreviewContainer');

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                container.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            container.style.display = 'none';
        }
    });
</script>

@endsection
