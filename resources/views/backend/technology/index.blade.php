@extends('dashboard')

@section('main')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Technology List</h4>
        <a href="{{ route('technologies.create') }}" class="btn btn-success">Add Technology</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
                <th>Short Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($technologies as $tech)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tech->name }}</td>
                <td>
                    @if($tech->image)
                        <img src="{{ asset($tech->image) }}" width="60" height="60" style="object-fit: cover;">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>
                <td>{{ \Illuminate\Support\Str::limit($tech->short_description, 60) }}</td>
                <td>
                    <a href="{{ route('technologies.edit', $tech->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('technologies.destroy', $tech->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this item?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
