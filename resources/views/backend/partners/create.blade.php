@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Partners /</span> {{ isset($partner) ? 'Edit Partner' : 'Add Partner' }}
    </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ isset($partner) ? route('admin.partners.update', $partner->id) : route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($partner))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label class="form-label">Partner Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $partner->name ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image {{ isset($partner) ? '(Leave empty if unchanged)' : '' }}</label>
                    <input type="file" name="image" class="form-control" {{ isset($partner) ? '' : 'required' }}>
                </div>

                @if(isset($partner))
                    <div class="mb-3">
                        <img src="{{ asset($partner->image) }}" width="150" style="object-fit: cover;">
                    </div>
                @endif

                <button type="submit" class="btn btn-success">{{ isset($partner) ? 'Update' : 'Add' }} Partner</button>
            </form>
        </div>
    </div>
</div>

@endsection
