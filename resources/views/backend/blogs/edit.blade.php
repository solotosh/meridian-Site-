@extends('dashboard')
@section('main')

<div class="container-xxl container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Blog /</span> {{ isset($blog) ? 'Edit' : 'Create' }}
    </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ isset($blog) ? route('admin.blogs.update', $blog->id) : route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($blog)) @method('PUT') @endif

                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label>Category</label>
                    <input type="text" name="category" class="form-control" value="{{ old('category', $blog->category ?? '') }}">
                </div>

                <div class="mb-3">
                    <label>Author</label>
                    <input type="text" name="author" class="form-control" value="{{ old('author', $blog->author ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label>Publish Date</label>
                    <input type="date" name="publish_date" class="form-control" value="{{ old('publish_date', $blog->publish_date ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label>Excerpt</label>
                    <textarea name="excerpt" class="form-control" rows="2">{{ old('excerpt', $blog->excerpt ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Content</label>
                    <textarea name="content" class="form-control" rows="5">{{ old('content', $blog->content ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Featured Image {{ isset($blog) ? '(leave empty to keep)' : '' }}</label>
                    <input type="file" name="image" class="form-control">
                    @if(isset($blog) && $blog->image)
                        <img src="{{ asset($blog->image) }}" width="120" class="mt-2">
                    @endif
                </div>

                <div class="mb-3">
                    <label>Author Image {{ isset($blog) ? '(leave empty to keep)' : '' }}</label>
                    <input type="file" name="author_image" class="form-control">
                    @if(isset($blog) && $blog->author_image)
                        <img src="{{ asset($blog->author_image) }}" width="80" class="mt-2">
                    @endif
                </div>

                <button type="submit" class="btn btn-success">{{ isset($blog) ? 'Update' : 'Publish' }}</button>
            </form>
        </div>
    </div>
</div>

@endsection
