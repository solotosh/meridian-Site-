@extends('dashboard')

@section('main')
<div class="container">
    <h4>{{ isset($aboutFeature) ? 'Edit Feature' : 'Add New Feature' }}</h4>

    <form method="POST" action="{{ isset($aboutFeature) ? route('about-features.update', $aboutFeature->id) : route('about-features.store') }}">
        @csrf
        @if(isset($aboutFeature)) @method('PUT') @endif

        <div class="mb-3">
            <label class="form-label">Icon (FontAwesome class)</label>
            <input type="text" name="icon" class="form-control" value="{{ old('icon', $aboutFeature->icon ?? '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $aboutFeature->title ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $aboutFeature->description ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($aboutFeature) ? 'Update' : 'Save' }}</button>
    </form>
</div>
@endsection
