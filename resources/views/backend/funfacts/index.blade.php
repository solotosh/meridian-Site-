@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">About /</span> Funfact Management
    </h4>

    @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Funfacts</h5>
            <a href="{{ route('funfacts.create') }}" class="btn btn-primary">
                <i class="bx bx-plus me-1"></i> Add New
            </a>
        </div>

        <div class="card-datatable table-responsive">
            <table class="table table-striped datatables-basic" id="funfactTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Counter</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($funfacts as $key => $funfact)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $funfact->title }}</td>
                        <td>{{ $funfact->count }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('funfacts.edit', $funfact->id) }}" class="btn btn-sm btn-icon me-2 text-warning">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{ route('funfacts.destroy', $funfact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this funfact?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-icon text-danger">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </form>
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
        $('#funfactTable').DataTable({
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search Funfacts..."
            }
        });
    });
</script>
@endpush

@endsection
