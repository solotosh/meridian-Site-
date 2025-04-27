
@extends('dashboard')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Choose Us /</span> Add Reason
    </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.chooseus.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Icon Class</label>
                    <input type="text" name="icon_class" class="form-control" placeholder="e.g. icon-19" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection


