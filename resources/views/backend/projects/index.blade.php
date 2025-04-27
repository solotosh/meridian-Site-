@extends('dashboard')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Projects /</span> Project Management
    </h4>
    @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Project Items</h5>
            <a href="{{ route('projects.create') }}" class="btn btn-primary">
                <i class="bx bx-plus me-1"></i> Add New
            </a>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-basic table border-top">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Icon</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $key => $project)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $project->title }}</td>
                        <td><i class="{{ $project->icon }}"></i></td>
                        <td>
                            @if($project->image)
                            <img src="{{ asset($project->image) }}" alt="" style="max-width: 80px; max-height: 60px;">
                            @else
                            <span class="text-muted">No image</span>
                            @endif
                        </td>
                      
                        <td>{{ \Illuminate\Support\Str::limit($project->description, 40) }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-icon me-2">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-icon delete-btn">
                                        <i class="bx bx-trash text-danger"></i>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "This will delete the project.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(result => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>
@endsection
