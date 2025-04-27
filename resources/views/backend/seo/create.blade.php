<!-- resources/views/admin/seo/create.blade.php -->

@extends('dashboard')

@section('main')
<div class="container py-4">
    <h4>Add SEO Data</h4>

    <form action="{{ route('seo.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="page" class="form-label">Page</label>
            <input type="text" name="page" class="form-control" id="page" required>
        </div>
        <div class="mb-3">
            <label for="meta_title" class="form-label">Meta Title</label>
            <input type="text" name="meta_title" class="form-control" id="meta_title" required>
        </div>
        <div class="mb-3">
            <label for="meta_description" class="form-label">Meta Description</label>
            <textarea name="meta_description" class="form-control" id="meta_description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="meta_keywords" class="form-label">Meta Keywords</label>
            <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" required>
        </div>
        <div class="mb-3">
            <label for="meta_author" class="form-label">Meta Author</label>
            <input type="text" name="meta_author" class="form-control" id="meta_author" required>
        </div>
        <button type="submit" class="btn btn-success">Save SEO Data</button>
    </form>
</div>
@endsection
