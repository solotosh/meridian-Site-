

@extends('dashboard')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Team /</span> Edit Member
    </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.team.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" value="{{ $member->name }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Designation</label>
                    <input type="text" name="designation" value="{{ $member->designation }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Facebook</label>
                    <input type="text" name="facebook" value="{{ $member->facebook }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Twitter</label>
                    <input type="text" name="twitter" value="{{ $member->twitter }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">WhatsApp</label>
                    <input type="text" name="whatsapp" value="{{ $member->whatsapp }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label><br>
                    @if($member->image)
                        <img src="{{ asset($member->image) }}" id="previewImage" style="height: 60px;" class="mb-2"><br>
                    @endif
                    <input type="file" name="image" id="imageUpload" class="form-control" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('imageUpload').addEventListener('change', function(e) {
        const previewImage = document.getElementById('previewImage');

        if (!e.target.files || !e.target.files[0]) {
            return;
        }

        const reader = new FileReader();

        reader.onload = function(e) {
            previewImage.src = e.target.result;
        }

        reader.readAsDataURL(e.target.files[0]);
    });
</script>
@endsection
