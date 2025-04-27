@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Menu /</span> Edit Menu
    </h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Menu Item</h5>
                    <a href="{{ route('allmenu') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back me-1"></i> Back to List
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('updatemenu',$menu->id) }}" method="POST">
                        @csrf
                       
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Name</label>
                            <input type="text" name="name" class="form-control" id="basic-default-fullname" 
                                   placeholder="Menu Name" value="{{ old('name', $menu->name) }}" />
                            @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Menu URL</label>
                            <input type="text" name="url" class="form-control" id="basic-default-company" 
                                   placeholder="URL" value="{{ old('url', $menu->url) }}" />
                            @error('url')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-type">Menu Type</label>
                            <input type="text" name="type" class="form-control" id="basic-default-type" 
                                   placeholder="Type" value="{{ old('type', $menu->type) }}" />
                            @error('type')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="status-select" class="form-label">Status</label>
                            <select class="form-select" id="status-select" name="is_active">
                                <option value="1" {{ $menu->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $menu->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="bx bx-save me-1"></i> Update Menu
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection