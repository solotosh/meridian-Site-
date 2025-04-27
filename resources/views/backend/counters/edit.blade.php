@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">About /</span> Edit Counter</h4>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update Counter Information</h5>
                    <small class="text-muted float-end">Edit counter record</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('updatecounter', $counter->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Label</label>
                            <input type="text" name="label" class="form-control" value="{{ old('label', $counter->label) }}" required />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Value</label>
                            <input type="number" name="value" class="form-control" value="{{ old('value', $counter->value) }}" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Suffix</label>
                            <input type="text" name="suffix" class="form-control" value="{{ old('suffix', $counter->suffix) }}" placeholder="e.g. K+, +" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Background Color</label>
                            <input type="text" name="background_color" class="form-control" value="{{ old('background_color', $counter->background_color) }}" placeholder="primary, dark, etc." />
                        </div>

                        <button type="submit" class="btn btn-primary">Update Counter</button>
                        <a href="{{ route('allcounts') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
