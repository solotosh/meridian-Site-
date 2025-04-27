@extends('dashboard')

@section('main')
<div class="container">
    <h4>About Features</h4>
    <a href="{{ route('about-features.create') }}" class="btn btn-success mb-3">Add New Feature</a>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr><th>#</th><th>Icon</th><th>Title</th><th>Description</th><th>Actions</th></tr>
        </thead>
        <tbody>
        @foreach($features as $feature)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><i class="{{ $feature->icon }}"></i></td>
                <td>{{ $feature->title }}</td>
               
                <td>{{ \Illuminate\Support\Str::limit($feature->description, 40) }}</td>
                <td>
                    <a href="{{ route('about-features.edit', $feature->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('about-features.destroy', $feature->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this feature?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $features->links() }}
</div>
@endsection
