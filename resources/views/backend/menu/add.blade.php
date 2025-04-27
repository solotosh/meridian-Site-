@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu/</span> Add Menu</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Add Menu Items</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('storemenu') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname"> Name</label>
                          <input type="text" name="name" class="form-control" id="basic-default-fullname" placeholder="Menu Name" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Menu Url</label>
                          <input type="text" name="url" class="form-control" id="basic-default-company" placeholder="URL." />
                        </div>
                      
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Menu Type</label>
                            <input type="text" name="type" class="form-control" id="basic-default-company" placeholder="Type." />
                          </div>
{{--                   
                          <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Status</label>
                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                              <option selected>select Status</option>
                              <option value="1">Active</option>
                              <option value="2">Inactive</option>
                             
                            </select>
                          </div> --}}

                       
                        <button type="submit" class="btn btn-primary">Save Menu</button>
                      </form>
                    </div>
                  </div>
                </div>
              
              </div>
            </div>



@endsection