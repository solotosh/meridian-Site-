<!-- resources/views/admin/seo/edit.blade.php -->

@extends('dashboard')

@section('main')
<div class="container py-4">
    <h4>Edit SEO Data for {{ $seo->page }}</h4>

    <form action="{{ route('seo.update', $seo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="meta_title" class="form-label">Meta Title</label>
            <input type="text" name="meta_title" class="form-control" id="meta_title" value="{{ old('meta_title', $seo->meta_title) }}" required>
        </div>
        <div class="mb-3">
            <label for="meta_description" class="form-label">Meta Description</label>
            <textarea name="meta_description" class="form-control" id="meta_description" required>{{ old('meta_description', $seo->meta_description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="meta_keywords" class="form-label">Meta Keywords</label>
            <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" value="{{ old('meta_keywords', $seo->meta_keywords) }}" required>
        </div>
        <div class="mb-3">
            <label for="meta_author" class="form-label">Meta Author</label>
            <input type="text" name="meta_author" class="form-control" id="meta_author" value="{{ old('meta_author', $seo->meta_author) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update SEO Data</button>
    </form>
</div>
@endsection
