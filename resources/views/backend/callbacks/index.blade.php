@extends('dashboard')
@section('main')
<div class="container mt-4">
    <h3>Callback Requests</h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Requested At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $key => $req)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $req->name }}</td>
                <td>{{ $req->phone }}</td>
                <td>{{ $req->created_at->diffForHumans() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $requests->links() }}
</div>
@endsection
