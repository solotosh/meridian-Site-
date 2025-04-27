@extends('dashboard')

@section('main')
<div class="container-xxl py-4">
    <!-- Message Card -->
    <div class="card shadow-sm" id="printableArea">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Message from {{ $message->username }}</h5>
            <a href="{{ route('admin.contact.messages') }}" class="btn btn-outline-secondary btn-sm">← Back</a>
        </div>
        <div class="card-body">
            <div class="mb-3"><strong>Email:</strong><p class="mb-0">{{ $message->email }}</p></div>
            <div class="mb-3"><strong>Phone:</strong><p class="mb-0">{{ $message->phone }}</p></div>
            <div class="mb-3"><strong>Subject:</strong><p class="mb-0">{{ $message->subject }}</p></div>
            <div class="mb-3"><strong>Message:</strong>
                <div class="border rounded p-3 bg-light">{{ $message->message }}</div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="mt-3 d-flex gap-2">
        <a href="{{ route('admin.contact.messages.download', $message->id) }}" class="btn btn-success">
            <i class="bx bx-download"></i> Download PDF
        </a>
        <button onclick="printDiv('printableArea')" class="btn btn-primary">
            <i class="bx bx-printer"></i> Print Message
        </button>
    </div>

    {{-- <!-- Quick Reply Form -->
    <div class="card mt-4">
        <div class="card-header">
            <h5>Quick Reply to {{ $message->email }}</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.contact.messages.reply', $message->id) }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Subject</label>
                    <input type="text" name="subject" class="form-control" value="RE: {{ $message->subject }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Reply Message</label>
                    <textarea name="reply_message" rows="5" class="form-control" placeholder="Type your reply..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Reply</button>
            </form>
        </div>
    </div>
</div> --}}

{{-- Print Script --}}
<script>
    function printDiv(divId) {
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>
@endsection
