@extends('layouts.dashboard')
@section('css')
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('assets/dashboard/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('page_title', __('dashboard.users').' | '.__('dashboard.edit'))
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="post" action="{{route('users.update', $user->id)}}" class="form-horizontal" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                      <div class="card-body">
                        <h5>{{__('dashboard.user_edit')}}</h5>
                          @if ($errors->any())
                              <div class="alert alert-danger">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <i class="material-icons">&times;</i>
                                  </button>
                                  <span>
                        {{$errors->first()}}
                    </span>
                              </div>
                          @endif
                          <div class="form-group row">
                              <label for="category_name" class="col-sm-3 text-right control-label col-form-label">{{__('dashboard.image')}}</label>
                              <div class="col-md-9">
                                  <div class="custom-file">
                                      <input name="image" type="file" class="custom-file-input" id="validatedCustomFile" >
                                      <label  class="custom-file-label" for="validatedCustomFile">{{__('dashboard.image')}}...</label>
                                      <div class="invalid-feedback">Example invalid custom file feedback</div>
                                      <div class="custom-file">
                                          <img style="margin-bottom:50px;width: 100px; height: 80px" src="{{@$user->image->url?(str_contains(@$user->image->url, 'users')?'/storage/'.@$user->image->url:@$user->image->url):asset('assets/site/images/avatar.png')}}">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="first_name" class="col-sm-3 text-right control-label col-form-label">{{__('site.first_name')}}</label>
                              <div class="col-sm-9">
                                  <input name="first_name" value="{{$user->first_name??old('first_name')}}" type="text" class="form-control" id="first_name" placeholder="{{__('site.first_name')}}">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="last_name" class="col-sm-3 text-right control-label col-form-label">{{__('site.last_name')}}</label>
                              <div class="col-sm-9">
                                  <input name="last_name" value="{{$user->last_name??old('last_name')}}" type="text" class="form-control" id="last_name" placeholder="{{__('site.last_name')}}">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="phone" class="col-sm-3 text-right control-label col-form-label">{{__('site.phone')}}</label>
                              <div class="col-sm-9">
                                  <input name="phone" value="{{$user->phone??old('phone')}}" type="number" class="form-control" id="phone" placeholder="{{__('site.phone')}}">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-sm-3 text-right control-label col-form-label">{{__('site.city')}}</label>
                              <div class="col-md-9">
                                  <select name="city_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                      <option  value="{{null}}">{{__('site.city')}}</option>
                                      @foreach($cities as $city)
                                          <option {{old('city_id')|$user->city_id == $city->id?'selected':''}} value="{{$city->id}}">{{$city->name}}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="address" class="col-sm-3 text-right control-label col-form-label">{{__('site.address')}}</label>
                              <div class="col-sm-9">
                                  <input name="address" value="{{$user->address??old('address')}}" type="text" class="form-control" id="address" placeholder="{{__('site.address')}}">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="email" class="col-sm-3 text-right control-label col-form-label">{{__('site.email')}}</label>
                              <div class="col-sm-9">
                                  <input name="email" value="{{$user->email??old('email')}}" type="text" class="form-control" id="email" placeholder="{{__('site.email')}}">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-sm-3 text-right control-label col-form-label">{{__('dashboard.role')}}</label>
                              <div class="col-md-9">
                                  <select name="role" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                      <option  value="{{null}}">{{__('dashboard.role')}}</option>
                                      <option {{$user->role == 'user'?'selected':''}} value="user">{{__('dashboard.user')}}</option>
                                      <option {{$user->role == 'admin'?'selected':''}} value="admin">{{__('dashboard.admin')}}</option>
                                      <option {{$user->role == 'owner'?'selected':''}} value="owner">{{__('dashboard.owner')}}</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">{{__('dashboard.submit')}}</button>
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
