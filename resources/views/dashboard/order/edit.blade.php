@extends('layouts.dashboard')
@section('css')
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('assets/dashboard/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('page_title','Slider| Edit')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="post" action="{{route('sliders.update', $slider->id)}}" class="form-horizontal" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                      <div class="card-body">
                        <h5>Slider Edit</h5>
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
                            <label for="slider_title" class="col-sm-3 text-right control-label col-form-label">SubCategory Name</label>
                            <div class="col-sm-9">
                                <input name="title" value="{{$slider->title}}" type="text" class="form-control" id="slider_title" placeholder="Slider Title Here">
                            </div>
                        </div>
                          <div class="form-group row">
                              <label for="category_name" class="col-sm-3 text-right control-label col-form-label">Category Image</label>
                              <div class="col-md-9">
                                  <div class="custom-file">
                                      <input name="image" type="file" class="custom-file-input" id="validatedCustomFile" required>
                                      <label  class="custom-file-label" for="validatedCustomFile">Choose category image...</label>
                                      <div class="invalid-feedback">Example invalid custom file feedback</div>
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
