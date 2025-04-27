@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Services /</span> Add Land & Survey Highlight
    </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.about.land.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Main Image</label>
                    <input type="file" name="image" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Author Name</label>
                    <input type="text" name="author_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Author Image</label>
                    <input type="file" name="author_image" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <input type="text" name="category" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <input type="text" name="status" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Icon Class (e.g. icon-1, icon-21)</label>
                    <input type="text" name="icon_class" class="form-control" placeholder="e.g. icon-1">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Link</label>
                    <input type="text" name="link" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Save Entry</button>
            </form>
        </div>
    </div>
</div>

@endsection
