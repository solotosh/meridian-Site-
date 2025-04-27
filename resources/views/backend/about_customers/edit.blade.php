@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit /</span> Customer Avatar</h4>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Edit Customer</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateclientab', $customer->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                      
                        <div class="mb-3">
                            <label class="form-label">Current Image</label><br>
                            @if($customer->image && file_exists(public_path('uploads/customers/' . $customer->image)))
                                <img src="{{ asset('uploads/customers/' . $customer->image) }}" alt="{{ $customer->alt }}" style="width: 100px; height: 100px; border-radius: 6px;">
                            @else
                                <span class="text-muted">No image uploaded</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Replace Image</label>
                            <input type="file" name="image" class="form-control" id="imageInput" accept="image/*" />
                            
                            <div class="mt-3">
                                <img id="previewImage" src="#" style="display: none; max-height: 150px; border-radius: 8px;" alt="Preview" />
                            </div>
                        </div>
                        

                        <div class="mb-3">
                            <label class="form-label">Alt Text</label>
                            <input type="text" name="alt" class="form-control" value="{{ old('alt', $customer->alt) }}" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image Position (px)</label>
                            <input type="number" name="position" class="form-control" value="{{ old('position', $customer->position) }}" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Label Top</label>
                            <input type="text" name="label_top" class="form-control" value="{{ old('label_top', $customer->label_top) }}" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Label Bottom</label>
                            <input type="text" name="label_bottom" class="form-control" value="{{ old('label_bottom', $customer->label_bottom) }}" />
                        </div>

                        <button type="submit" class="btn btn-primary">Update Customer</button>
                        <a href="{{ route('aboutclients') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('imageInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('previewImage');

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.style.display = 'none';
            preview.src = '#';
        }
    });
</script>

@endsection
