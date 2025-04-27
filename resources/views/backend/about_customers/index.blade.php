@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">About /</span> Customer Trust Section
    </h4>

    @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Customer Section</h5>
            <a href="{{ route('addclientab') }}" class="btn btn-primary">
                <i class="bx bx-plus me-1"></i> Add New
            </a>
        </div>

        <div class="card-datatable table-responsive">
            <table class="table table-striped table-bordered" id="customerTable">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Alt Text</th>
                        <th>Position</th>
                        <th>Label Top</th>
                        <th>Label Bottom</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            @if($item->image && file_exists(public_path('uploads/customers/' . $item->image)))
                                <img 
                                    src="{{ asset('uploads/customers/' . $item->image) }}" 
                                    alt="{{ $item->alt }}" 
                                    class="img-thumbnail preview-image" 
                                    style="width: 70px; height: 70px; cursor: pointer;"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#previewModal" 
                                    data-img="{{ asset('uploads/customers/' . $item->image) }}"
                                >
                            @else
                                <span class="badge bg-secondary">No Image</span>
                            @endif
                        </td>
                        
                        <td>{{ $item->alt ?? '-' }}</td>
                        <td><span class="badge bg-info">{{ $item->position }}px</span></td>
                        <td><span class="text-success">{{ $item->label_top ?? '-' }}</span></td>
                        <td><span class="text-primary">{{ $item->label_bottom ?? '-' }}</span></td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('editclientab', $item->id) }}" class="btn btn-sm btn-icon me-2" title="Edit">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{ route('deleteclientab', $item->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-icon delete-btn" title="Delete">
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
<!-- Modal -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Image Preview</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <img id="modalImage" src="#" alt="Customer Image" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const previewImages = document.querySelectorAll('.preview-image');
        const modalImage = document.getElementById('modalImage');

        previewImages.forEach(img => {
            img.addEventListener('click', () => {
                const src = img.getAttribute('data-img');
                modalImage.setAttribute('src', src);
            });
        });
    });
</script>

{{-- SweetAlert Delete --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const form = this.closest('.delete-form');
                Swal.fire({
                    title: 'Delete this customer image?',
                    text: "This action cannot be undone.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>

@push('scripts')
<script>
    $(document).ready(function () {
        $('#customerTable').DataTable({
            responsive: true,
            dom: '<"top"f>rt<"bottom"lip><"clear">',
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search customer entries...",
            }
        });
    });
</script>
@endpush

@endsection
