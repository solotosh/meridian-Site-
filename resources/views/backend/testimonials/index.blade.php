@extends('dashboard')
@section('main')
@php
    use App\Models\Testimonial;
    $testimonials = Testimonial::latest()->get();
@endphp
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Testimonials /</span> All Testimonials
    </h4>

    <div class="card">
        <div class="card-body">
            <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary mb-3">Add New Testimonial</a>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonials as $item)
                        <tr>
                            <td><img src="{{ asset($item->image) }}" width="50"></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->designation }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($item->message, 40) }}</td>
                            <td>
                                <a href="{{ route('admin.testimonials.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.testimonials.delete', $item->id) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this testimonial?')">Delete</button>
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
