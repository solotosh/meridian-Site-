@extends('dashboard')

@section('main')
<div class="container">
    <h4>Contact Messages</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th><th>Email</th><th>Subject</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $msg)
            <tr>
                <td>{{ $msg->username }}</td>
                <td>{{ $msg->email }}</td>
                <td>{{ $msg->subject ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.contact.messages.show', $msg->id) }}" class="btn btn-info btn-sm">View</a>
                    <form action="{{ route('admin.contact.messages.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
