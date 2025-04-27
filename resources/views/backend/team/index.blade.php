

@extends('dashboard')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Team /</span> All Members
    </h4>

    <div class="card">
        <div class="card-body">
            <a href="{{ route('admin.team.create') }}" class="btn btn-primary mb-3">Add New Member</a>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>WhatsApp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($team as $member)
                        <tr>
                            <td><img src="{{ asset($member->image) }}" width="50"></td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->designation }}</td>
                            <td><a href="{{ $member->facebook }}" target="_blank">FB</a></td>
                            <td><a href="{{ $member->twitter }}" target="_blank">Twitter</a></td>
                            <td><a href="{{ $member->whatsapp }}" target="_blank">WhatsApp</a></td>
                            <td>
                                <a href="{{ route('admin.team.edit', $member->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.team.delete', $member->id) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
