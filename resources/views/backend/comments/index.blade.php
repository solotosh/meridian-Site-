@extends('dashboard')
@section('main')
<h4>Blog Comments Moderation</h4>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th><th>Email</th><th>Message</th><th>Status</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($comments as $comment)
        <tr>
            <td>{{ $comment->name }}</td>
            <td>{{ $comment->email }}</td>
            <td>{{ \Illuminate\Support\Str::limit($comment->message, 80) }}</td>
            <td><span class="badge bg-{{ $comment->status === 'approved' ? 'success' : 'warning' }}">{{ ucfirst($comment->status) }}</span></td>
            <td>
                @if($comment->status !== 'approved')
                    <form method="POST" action="{{ route('admin.comments.approve', $comment->id) }}">
                        @csrf
                        <button class="btn btn-sm btn-success">Approve</button>
                    </form>
                @endif
                <form method="POST" action="{{ route('admin.comments.delete', $comment->id) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
