@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Services /</span> All Survey Services</h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Service List</h5>
            <a href="{{ route('admin.survey.services.create') }}" class="btn btn-sm btn-primary">Add New</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Icon</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->title }}</td>
                            <td><i class="{{ $item->icon }}"></i></td>
                            <td>
                                @if($item->image)
                                    <img src="{{ asset($item->image) }}" width="60" class="rounded" />
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.survey.services.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ route('admin.survey.services.delete', $item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
