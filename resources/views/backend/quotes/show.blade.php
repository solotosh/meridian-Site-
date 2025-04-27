@extends('dashboard')

@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Quote from {{ $quote->name }}</h4>
        <div>
            <a href="{{ route('admin.quotes.index') }}" class="btn btn-secondary">Back</a>
            <button onclick="window.print()" class="btn btn-outline-dark">Print</button>
        </div>
    </div>

    <div class="card p-4 shadow-sm">
        <p><strong>Name:</strong> {{ $quote->name }}</p>
        <p><strong>Email:</strong> {{ $quote->email ?? 'N/A' }}</p>
        <p><strong>Phone:</strong> {{ $quote->phone }}</p>
        <p><strong>Location:</strong> {{ $quote->location }}</p>
        <p><strong>Details:</strong><br>{{ $quote->details }}</p>

        @if($quote->title_deed)
        <p><strong>Title Deed:</strong>
            <a href="{{ asset($quote->title_deed) }}" target="_blank" class="btn btn-sm btn-success">View / Download</a>
        </p>
        @endif

        <!-- ✅ WhatsApp Quick Reply -->
        <div class="mt-4">
            <h5>Quick Reply</h5>
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $quote->phone) }}?text=Hello%20{{ urlencode($quote->name) }},%20we%20received%20your%20quote%20request%20and%20will%20get%20back%20to%20you%20shortly."
               target="_blank"
               class="btn btn-success">
                <i class="bx bxl-whatsapp"></i> Reply via WhatsApp
            </a>
        </div>
    </div>
</div>
@endsection
