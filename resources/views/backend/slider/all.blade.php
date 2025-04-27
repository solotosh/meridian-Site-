@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Sliders /</span> Slider Management
    </h4>
    
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Slider Items</h5>
            <a href="{{ route('addslider') }}" class="btn btn-primary">
                <i class="bx bx-plus me-1"></i> Add New
            </a>
        </div>
        
        <div class="card-datatable table-responsive">
            <table class="datatables-basic table border-top" id="sliderTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Buttons</th>
                        <th>Alignment</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($sliders as $key => $slider)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <strong>{{ $slider->title }}</strong>
                            </div>
                        </td>
                        <td>
                            @if($slider->image)
                            <img src="{{ asset('uploads/carousel/'.$slider->image) }}" alt="{{ $slider->title }}" style="max-width: 100px; max-height: 60px;">
                            @else
                            <span class="text-muted">No image</span>
                            @endif
                        </td>
                        <td>{{ \Illuminate\Support\Str::limit($slider->description, 25) }}</td>
                        <td>
                            @if($slider->button1_text)
                            <span class="badge bg-primary me-1">{{ $slider->button1_text }}</span>
                            @endif
                            @if($slider->button2_text)
                            <span class="badge bg-secondary">{{ $slider->button2_text }}</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-info text-capitalize">{{ $slider->alignment }}</span>
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('editslider',$slider->id) }}" class="btn btn-sm btn-icon me-2">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{ route('deleslider',$slider->id) }}" method="POST" class="delete-form">
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

<script>
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
        $('#sliderTable').DataTable({
            responsive: true,
            dom: '<"top"f>rt<"bottom"lip><"clear">',
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search sliders...",
            }
        });
    });
</script>
@endpush

@endsection