@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Services /</span> Edit Service</h4>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Update Service</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.survey.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $service->title }}" required />
                </div>

                <div class="mb-3">
                    <label class="form-label">Icon Class (FontAwesome)</label>
                    <input type="text" name="icon" class="form-control" value="{{ $service->icon }}" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Short Description</label>
                    <textarea name="short_des" class="form-control" rows="2">{{ $service->short_des }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Full Description</label>
                    <textarea name="description" class="form-control" rows="4">{{ $service->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Link</label>
                    <input type="text" name="link" class="form-control" value="{{ $service->link }}" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label><br>
                    @if($service->image)
                        <img src="{{ asset($service->image) }}" style="max-height: 80px;" class="mb-2 rounded"><br>
                    @endif
                    <input type="file" name="image" class="form-control" />
                </div>

                <button type="submit" class="btn btn-success">Update Service</button>
            </form>
        </div>
    </div>
</div>
@endsection
