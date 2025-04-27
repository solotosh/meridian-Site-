@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Partners /</span> All Partners
    </h4>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Manage Partners</h5>
            <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">
                <i class="bx bx-plus me-1"></i> Add Partner
            </a>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partners as $index => $partner)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $partner->name }}</td>
                        <td><img src="{{ asset($partner->image) }}" width="80" height="80" style="object-fit: cover;"></td>
                        <td>
                            <a href="{{ route('admin.partners.edit', $partner->id) }}" class="btn btn-sm btn-icon text-primary"><i class="bx bx-edit"></i></a>
                            <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-icon text-danger"><i class="bx bx-trash"></i></button>
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
