@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Logo /</span> Upload Logo</h4>

  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Add Site Logo</h5>
          <small class="text-muted float-end">Supported: jpg, png, webp</small>
        </div>
        <div class="card-body">
         
        

          <form action="{{ route('logostore') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
              <label class="form-label">Upload Logo</label>
              <input type="file" name="logo" id="logoInput" class="form-control @error('logo') is-invalid @enderror" accept="image/*">
              @error('logo')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Image Preview Container -->
            <div class="mb-3" id="imagePreviewContainer" style="display: none;">
              <label class="form-label">Logo Preview</label>
              <div class="border p-3 rounded" style="max-width: 300px;">
                <img id="imagePreview" src="#" alt="Logo Preview" class="img-fluid">
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Logo</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const logoInput = document.getElementById('logoInput');
    const imagePreview = document.getElementById('imagePreview');
    const imagePreviewContainer = document.getElementById('imagePreviewContainer');

    logoInput.addEventListener('change', function() {
      if (this.files && this.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
          imagePreview.src = e.target.result;
          imagePreviewContainer.style.display = 'block';
        }
        
        reader.readAsDataURL(this.files[0]);
      } else {
        imagePreviewContainer.style.display = 'none';
      }
    });
  });
</script>

@endsection