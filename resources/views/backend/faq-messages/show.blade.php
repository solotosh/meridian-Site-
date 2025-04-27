@extends('dashboard')

@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">
            <i class="bx bx-envelope-open text-primary me-2"></i>
            Message from {{ $message->name }}
        </h4>
        <a href="{{ route('admin.faq.messages') }}" class="btn btn-outline-primary">
            <i class="bx bx-arrow-back"></i> Back to All
        </a>
    </div>

    <div class="card border shadow-sm">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label fw-semibold"><i class="bx bx-user"></i> Name</label>
                <div class="form-control-plaintext">{{ $message->name }}</div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold"><i class="bx bx-mail-send"></i> Email</label>
                <div class="form-control-plaintext">{{ $message->email }}</div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold"><i class="bx bx-comment-dots"></i> Message</label>
                <div class="p-3 border rounded bg-light text-dark" style="white-space: pre-line;">
                    {{ $message->message }}
                </div>
            </div>

            <div class="text-end text-muted">
                <small><i class="bx bx-time"></i> Submitted on: {{ $message->created_at->format('d M Y, h:i A') }}</small>
            </div>
        </div>
    </div>
</div>
@endsection
