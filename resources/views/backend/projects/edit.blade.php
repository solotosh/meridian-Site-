@extends('dashboard')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Projects /</span> Edit Project</h4>
    <div class="card">
        <div class="card-header"><h5 class="mb-0">Update Project</h5></div>
        <div class="card-body">
           
                <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">

                @csrf
            
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $project->title }}" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">Tagline</label>
                    <input type="text" name="tagline" class="form-control" value="{{ $project->tagline }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Icon (FontAwesome)</label>
                    <input type="text" name="icon" class="form-control" value="{{ $project->icon }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ $project->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Read More Link</label>
                    <input type="text" name="link" class="form-control" value="{{ $project->link }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" id="imageUpload" class="form-control" accept="image/*" />
                    @if($project->image)
                    <div class="mt-2">
                        <img src="{{ asset($project->image) }}" alt="Current Image" class="img-fluid rounded" style="max-width: 200px;">
                    </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update Project</button>
            </form>
        </div>
    </div>
</div>
<script>
document.getElementById('imageUpload').addEventListener('change', function(e) {
    const reader = new FileReader();
    reader.onload = function(e) {
        const preview = document.createElement('img');
        preview.src = e.target.result;
        preview.className = 'img-fluid rounded mt-2';
        preview.style.maxWidth = '200px';
        const previewContainer = e.target.closest('.mb-3');
        const existing = previewContainer.querySelector('img:not([id])');
        if (existing) existing.remove();
        previewContainer.appendChild(preview);
    }
    reader.readAsDataURL(e.target.files[0]);
});
</script>
@endsection
