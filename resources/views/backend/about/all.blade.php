@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Service /</span> Land & Survey Highlights
    </h4>

    @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Land & Survey Entries</h5>
            <a href="{{ route('admin.about.land.create') }}" class="btn btn-primary">
                <i class="bx bx-plus me-1"></i> Add New
            </a>
        </div>

        <div class="card-datatable table-responsive">
            <table class="datatables-basic table border-top" id="aboutLandTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Main Image</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($entries as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->category }}</td>
                        <td>
                            @if($item->image)
                            <img src="{{ asset($item->image) }}" style="max-height: 60px;">
                            @else
                            <span class="text-muted">No image</span>
                            @endif
                        </td>
                        <td>
                            {{ $item->author_name }}
                            @if($item->author_image)
                            <br><img src="{{ asset($item->author_image) }}" style="max-height: 40px;">
                            @endif
                        </td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('admin.about.land.edit', $item->id) }}" class="btn btn-sm btn-icon me-2"><i class="bx bx-edit"></i></a>
                                <a href="{{ route('admin.about.land.delete', $item->id) }}" onclick="return confirm('Delete this entry?')" class="btn btn-sm btn-icon text-danger"><i class="bx bx-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        $('#aboutLandTable').DataTable({
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search entries..."
            }
        });
    });
</script>
@endpush

@endsection
