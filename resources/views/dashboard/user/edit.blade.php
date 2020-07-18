@extends('layouts.dashboard')
@section('css')
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('assets/dashboard/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('page_title','Users| Edit')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="post" action="{{route('users.update', $user->id)}}" class="form-horizontal" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                      <div class="card-body">
                        <h5>Users Edit</h5>
                          @if ($errors->any())
                              <div class="alert alert-danger">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <i class="material-icons">close</i>
                                  </button>
                                  <span>
                        {{$errors->first()}}
                    </span>
                              </div>
                          @endif
                          <div class="form-group row">
                              <label for="first_name" class="col-sm-3 text-right control-label col-form-label">User First Name</label>
                              <div class="col-sm-9">
                                  <input name="first_name" value="{{$user->first_name??old('first_name')}}" type="text" class="form-control" id="first_name" placeholder="User First Name Here">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="last_name" class="col-sm-3 text-right control-label col-form-label">User Last Name</label>
                              <div class="col-sm-9">
                                  <input name="last_name" value="{{$user->last_name??old('last_name')}}" type="text" class="form-control" id="last_name" placeholder="User Last Name Here">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="phone" class="col-sm-3 text-right control-label col-form-label">User Phone</label>
                              <div class="col-sm-9">
                                  <input name="phone" value="{{$user->phone??old('phone')}}" type="text" class="form-control" id="phone" placeholder="User Phone Here">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="address" class="col-sm-3 text-right control-label col-form-label">User Address</label>
                              <div class="col-sm-9">
                                  <input name="address" value="{{$user->address??old('address')}}" type="text" class="form-control" id="address" placeholder="User Address Here">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="email" class="col-sm-3 text-right control-label col-form-label">User Email</label>
                              <div class="col-sm-9">
                                  <input name="email" value="{{$user->email??old('email')}}" type="text" class="form-control" id="email" placeholder="User Email Here">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-sm-3"></label>
                              <div class="col-md-9">
                                  <div class="custom-control custom-checkbox mr-sm-2">
                                      <input name="is_admin" type="checkbox" class="custom-control-input" id="is_admin">
                                      <label class="custom-control-label" for="is_admin">Admin</label>
                                  </div>
                              </div>
                          </div>
                      </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{asset('assets/dashboard/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{asset('assets/dashboard/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
    <script src="{{asset('assets/dashboard/extra-libs/DataTables/datatables.min.js')}}"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

@endsection
