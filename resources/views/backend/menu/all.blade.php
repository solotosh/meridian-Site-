@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Menu /</span> Menu Management
    </h4>
    
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Menu Items</h5>
            <a href="{{ route('menucreate') }}" class="btn btn-primary">
                <i class="bx bx-plus me-1"></i> Add New
            </a>
        </div>
        
        <div class="card-datatable table-responsive">
            <table class="datatables-basic table border-top" id="menuTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Link</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($menus as $key => $menu)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <strong>{{ $menu->name }}</strong>
                            </div>
                        </td>
                        <td>{{ $menu->url }}</td>
                        <td>{{ $menu->type }}</td>
                        <td>
                            <span class="badge bg-{{ $menu->is_active === 1 ? 'success' : 'danger' }}">
                                {{ $menu->is_active === 1 ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('editmenu',$menu->id) }}" class="btn btn-sm btn-icon me-2">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{ route('menudestroy', $menu->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-icon delete-btn">
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

<<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Delete confirmation with SweetAlert
        const deleteButtons = document.querySelectorAll('.delete-btn');
        
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('.delete-form');
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
    </script>

<!-- Initialize DataTable -->
@push('scripts')
<script>
    $(document).ready(function() {
        $('#menuTable').DataTable({
            responsive: true,
            dom: '<"top"f>rt<"bottom"lip><"clear">',
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search menus...",
            }
        });
    });
</script>
@endpush

@endsection