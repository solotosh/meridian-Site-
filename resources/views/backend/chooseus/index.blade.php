@extends('dashboard')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Choose Us Reasons <span class="text-muted fw-light">/ List</span></h4>

    <a href="{{ route('admin.chooseus.create') }}" class="btn btn-primary mb-3">Add New Reason</a>

    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Icon</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reasons as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->title }}</td>
                        <td><i class="{{ $item->icon }}"></i></td>
                        <td>{{ \Illuminate\Support\Str::limit($item->description, 60) }}</td>
                        <td>
                            <a href="{{ route('admin.chooseus.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="{{ route('admin.chooseus.delete', $item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
