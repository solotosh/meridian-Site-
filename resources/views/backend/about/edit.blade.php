@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Services /</span> Edit Land & Survey Highlight
    </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.about.land.update', $entry->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $entry->title }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Main Image</label><br>
                    @if($entry->image)
                    <img src="{{ asset($entry->image) }}" class="mb-2" style="height: 60px;"><br>
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Author Name</label>
                    <input type="text" name="author_name" class="form-control" value="{{ $entry->author_name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Author Image</label><br>
                    @if($entry->author_image)
                    <img src="{{ asset($entry->author_image) }}" class="mb-2" style="height: 40px;"><br>
                    @endif
                    <input type="file" name="author_image" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <input type="text" name="category" class="form-control" value="{{ $entry->category }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <input type="text" name="status" class="form-control" value="{{ $entry->status }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Icon Class (e.g. icon-1, icon-21)</label>
                    <input type="text" name="icon_class" class="form-control" value="{{ $entry->icon_class }}">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4">{{ $entry->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Link</label>
                    <input type="text" name="link" class="form-control" value="{{ $entry->link }}">
                </div>

                <button type="submit" class="btn btn-success">Update Entry</button>
            </form>
        </div>
    </div>
</div>

@endsection
