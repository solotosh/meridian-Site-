@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">About /</span> Add About Info & Customer Icon</h4>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add About Information</h5>
                    <small class="text-muted float-end">Company background and customer details</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('storecounter') }}" method="POST" >
                        @csrf

                        {{-- About Fields --}}
                        <div class="mb-3">
                            <label class="form-label">Label</label>
                            <input type="text" name="label" class="form-control" placeholder="Project Complete" required />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">value</label>
                            <input type="number" name="value" class="form-control" placeholder="3200" />
                        </div>

                       
                        <hr class="my-4">
                        

                        <div class="mb-3">
                            <label class="form-label">Suffix</label>
                            <input type="text" name="suffix" class="form-control" placeholder="e.g.K+,+" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">background_color</label>
                            <input type="text" name="background_color" class="form-control" placeholder="primary,secondary" />
                        </div>

                       

                        <button type="submit" class="btn btn-primary">Save Counter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
