@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Blog /</span> All Posts
    </h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Blog Articles</h5>
            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                <i class="bx bx-plus me-1"></i> Add Blog
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Publish Date</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $index => $blog)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->author }}</td>
                        <td>{{ \Carbon\Carbon::parse($blog->publish_date)->format('d M Y') }}</td>
                        <td>
                            @if($blog->image)
                            <img src="{{ asset($blog->image) }}" width="80" style="object-fit: cover;">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-primary"><i class="bx bx-edit"></i></a>
                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this blog?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
