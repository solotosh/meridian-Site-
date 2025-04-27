@extends('dashboard')
@section('main')
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Quotation /</span> Requests
    </h4>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Quotation Requests</h5>
            <div>
                <a href="{{ route('admin.quotations.excel') }}" class="btn btn-success btn-sm me-2">
                    <i class="bx bx-spreadsheet"></i> Export Excel
                </a>
                <a href="{{ route('admin.quotations.pdf') }}" class="btn btn-danger btn-sm">
                    <i class="bx bxs-file-pdf"></i> Export PDF
                </a>
            </div>
        </div>

        <div class="card-datatable table-responsive">
            <table class="datatables-basic table border-top" id="quotationTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        {{-- <th>Submitted At</th> --}}
                        <th>Title Deed</th> <!-- New -->
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($quotations as $index => $quote)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $quote->name }}</strong></td>
                        <td>{{ $quote->email }}</td>
                        <td>
                            {{ $quote->phone }}
                            @php
                                $phoneDigits = preg_replace('/[^0-9]/', '', $quote->phone);
                                $message = "Hello {$quote->name}, we received your quote request on " . $quote->created_at->format('d M Y') . ". How can we assist you further?";
                                $whatsAppUrl = "https://wa.me/{$phoneDigits}?text=" . urlencode($message);
                            @endphp
                           <a href="{{ $whatsAppUrl }}"
                           target="_blank"
                           class="ms-2 text-success"
                           title="Send WhatsApp to {{ $quote->name }}">
                            <i class="bx bxl-whatsapp" style="font-size: 1.4rem;"></i>
                        </a>
                        
                        </td>
                        
                        {{-- <td>{{ $quote->created_at->format('d M Y, h:i A') }}</td> --}}
                        <td>
                            @if($quote->title_deed_path)
                                @php
                                    $filePath = asset($quote->title_deed_path);
                                    $isImage = preg_match('/\.(jpg|jpeg|png)$/i', $quote->title_deed_path);
                                @endphp
                
                                @if($isImage)
                                    <a href="{{ $filePath }}" target="_blank">
                                        <img src="{{ $filePath }}" alt="Deed" style="width: 60px; height: auto; border: 1px solid #ccc; border-radius: 4px;">
                                    </a>
                                @else
                                    <a href="{{ $filePath }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="bx bxs-file-pdf"></i> View PDF
                                    </a>
                                @endif
                
                                <a href="{{ $filePath }}" download class="btn btn-sm btn-outline-success mt-1">
                                    <i class="bx bx-download"></i> Download
                                </a>
                            @else
                                <span class="text-muted">No Tittle Deed Attached</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $quotations->links() }}
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#quotationTable').DataTable({
            responsive: true,
            dom: '<"top"f>rt<"bottom"lip><"clear">',
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search quotations...",
            }
        });
    });
</script>
@endpush

@endsection
