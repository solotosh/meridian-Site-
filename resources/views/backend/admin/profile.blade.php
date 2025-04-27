@extends('dashboard')

@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
          <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
        </li>
      </ul>

      <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>

        <div class="card-body">
          <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img
              src="{{ !empty($adminData->photo) ? asset('uploads/admin/'.$adminData->photo) : asset('assets/img/avatars/1.png') }}"
              alt="user-avatar"
              class="d-block rounded"
              height="100"
              width="100"
              id="uploadedAvatar"
            />
          </div>
        </div>

        <hr class="my-0" />
        <div class="card-body">
          <form id="formAccountSettings" method="POST" enctype="multipart/form-data" action="{{ route('admin.profile.update') }}">
            @csrf
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">Name</label>
                <input class="form-control" type="text" id="firstName" name="name" value="{{ old('name', $adminData->name) }}" autofocus />
              </div>

              <div class="mb-3 col-md-6">
                <label for="lastName" class="form-label">Username</label>
                <input class="form-control" type="text" name="username" id="lastName" value="{{ old('username', $adminData->username) }}" />
              </div>

              <div class="mb-3 col-md-6">
                <label for="email" class="form-label">E-mail</label>
                <input class="form-control" type="email" id="email" name="email" value="{{ old('email', $adminData->email) }}" />
              </div>

              <div class="mb-3 col-md-6">
                <label class="form-label" for="phoneNumber">Phone Number</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text">KE (+254)</span>
                  <input type="text" id="phoneNumber" name="phone" class="form-control" value="{{ old('phone', $adminData->phone) }}" />
                </div>
              </div>

              <div class="mb-3 col-md-6">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $adminData->address) }}" />
              </div>

              <div class="mb-3 col-md-6">
                <label class="form-label">Image</label>
                <input type="file" name="photo" class="form-control" id="imageInput" accept="image/*" />
                <div class="mt-3">
                  <img id="imagePreview" src="#" alt="Preview" style="display: none; max-height: 100px; border-radius: 8px;" />
                </div>
              </div>

              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Image Preview Script -->
<script>
  document.getElementById('imageInput').addEventListener('change', function (event) {
    const image = event.target.files[0];
    const preview = document.getElementById('imagePreview');

    if (image) {
      preview.src = URL.createObjectURL(image);
      preview.style.display = 'block';
    } else {
      preview.style.display = 'none';
    }
  });
</script>
@endsection
