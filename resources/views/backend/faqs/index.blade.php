@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">FAQ /</span> All Questions
    </h4>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Manage FAQs</h5>
            <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">
                <i class="bx bx-plus me-1"></i> Add FAQ
            </a>
        </div>

        <div class="card-datatable table-responsive">
            <table class="table table-bordered table-hover" id="faqTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($faqs as $index => $faq)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $faq->question }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($faq->answer, 60) }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-sm btn-icon me-2 text-primary">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" onsubmit="return confirm('Delete this FAQ?')">
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
        $('#faqTable').DataTable({
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search FAQs..."
            }
        });
    });
</script>
@endpush

@endsection
