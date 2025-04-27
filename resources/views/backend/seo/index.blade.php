<!-- resources/views/admin/seo/index.blade.php -->

@extends('dashboard')

@section('main')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>SEO Data Management</h4>
        <a href="{{ route('seo.create') }}" class="btn btn-success">Add SEO Data</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Page</th>
                <th>Meta Title</th>
                <th>Meta Description</th>
                <th>Meta Keywords</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($seoData as $seo)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $seo->page }}</td>
                <td>{{ \Illuminate\Support\Str::limit($seo->meta_title, 30) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($seo->meta_description, 60) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($seo->meta_keywords, 30) }}</td>
                <td>
                    <a href="{{ route('seo.edit', $seo->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('seo.destroy', $seo->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this SEO data?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
