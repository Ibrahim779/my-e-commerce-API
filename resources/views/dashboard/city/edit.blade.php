@extends('layouts.dashboard')
@section('css')
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('assets/dashboard/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/libs/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/libs/jquery-minicolors/jquery.minicolors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/libs/quill/dist/quill.snow.css')}}">
@endsection
@section('page_title','Cities| Add')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="post" action="{{route('cities.update', $city->id)}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <h5>Cities Add</h5>
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
                                <label for="brand_name" class="col-sm-3 text-right control-label col-form-label">City Name</label>
                                <div class="col-sm-9">
                                    <input name="name" value="{{$city->name??old('name')}}" type="text" class="form-control" id="brand_name" placeholder="Brand Name Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="shipping" class="col-sm-3 text-right control-label col-form-label">Shipping</label>
                                <div class="col-sm-9">
                                    <input name="shipping" value="{{$city->shipping??old('shipping')}}" type="text" class="form-control" id="shipping" placeholder="Brand Name Here">
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
    <script src="{{asset('assets/dashboard/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/dist/js/pages/mask/mask.init.js')}}"></script>
    <script src="{{asset('assets/dashboard/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/libs/jquery-asColor/dist/jquery-asColor.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/libs/jquery-asGradient/dist/jquery-asGradient.js')}}"></script>
    <script src="{{asset('assets/dashboard/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/libs/jquery-minicolors/jquery.minicolors.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/libs/quill/dist/quill.min.js')}}"></script>
    <script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
            //
            // Dear reader, it's actually very easy to initialize MiniColors. For example:
            //
            //  $(selector).minicolors();
            //
            // The way I've done it below is just for the demo, so don't get confused
            // by it. Also, data- attributes aren't supported at this time...they're
            // only used for this demo.
            //
            $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

    </script>

@endsection
