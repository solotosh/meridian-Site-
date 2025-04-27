@extends('dashboard') {{-- Or your main layout --}}

@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">FAQ Messages</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                       
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $key => $msg)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $msg->name }}</td>
                        <td>{{ $msg->email }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($msg->message, 34) }}</td>
                       
                        <td>
                            <a href="{{ route('admin.faq.messages.show', $msg->id) }}" class="btn btn-sm btn-info">View</a>

                            <form action="{{ route('admin.faq.messages.delete', $msg->id) }}" method="POST" style="display:inline-block;" 
                                onsubmit="return confirm('Are you sure you want to delete this message?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No messages yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
