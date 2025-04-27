@extends('dashboard')

@section('main')
<div class="container-xxl py-4">
    <h4 class="fw-bold mb-4">Edit About Feature</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>There were some issues:</strong>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('about-features.update', $aboutFeature->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="icon" class="form-label">Icon (FontAwesome class)</label>
            <input type="text" name="icon" id="icon" class="form-control" placeholder="e.g. fas fa-map-marker-alt"
                value="{{ old('icon', $aboutFeature->icon) }}">
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Feature Title</label>
            <input type="text" name="title" id="title" class="form-control"
                value="{{ old('title', $aboutFeature->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Feature Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" 
            required>{{ old('description', $aboutFeature->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Feature</button>
        <a href="{{ route('about-features.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
