@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold mb-4">
        <span class="text-muted fw-light">Funfact /</span> Edit Funfact
    </h4>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> There are some problems with your input.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('funfacts.update', $funfact->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Counter Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ $funfact->title }}" required>
                </div>

                <div class="mb-3">
                    <label for="count" class="form-label">Counter Value</label>
                    <input type="number" name="count" class="form-control" id="count" value="{{ $funfact->count }}" required>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('funfacts.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection
