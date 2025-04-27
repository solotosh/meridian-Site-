@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">About /</span> About Us Management
    </h4>

    @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">About Us Entries</h5>
            <a href="{{ route('addaboutadmin') }}" class="btn btn-primary">
                <i class="bx bx-plus me-1"></i> Add New
            </a>
        </div>

        <div class="card-datatable table-responsive">
            <table class="datatables-basic table border-top" id="aboutTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Heading</th>
                        <th>Subheading</th>
                        {{-- <th>Top Image</th> --}}
                        <th>Bottom Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($about as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><strong>{{ $item->heading }}</strong></td>
                        <td>{{ $item->subheading }}</td>
                        <td>
                            @if($item->image_top)
                            <img src="{{ asset($item->image_top) }}" style="max-width: 100px; max-height: 60px;">
                            @else
                            <span class="text-muted">No image</span>
                            @endif
                        </td>
                        {{-- <td>
                            @if($item->image_bottom)
                            <img src="{{ asset($item->image_bottom) }}" style="max-width: 100px; max-height: 60px;">
                            @else
                            <span class="text-muted">No image</span>
                            @endif
                        </td> --}}
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('editadminabout', $item->id) }}" class="btn btn-sm btn-icon me-2"><i class="bx bx-edit"></i></a>
                                <form action="{{ route('about.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-icon text-danger"><i class="bx bx-trash"></i></button>
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
        $('#aboutTable').DataTable({
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search About entries..."
            }
        });
    });
</script>
@endpush

@endsection
