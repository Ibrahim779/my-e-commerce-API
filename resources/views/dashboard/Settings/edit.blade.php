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
@section('page_title', __('dashboard.settings').' | '.__('dashboard.edit'))
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="post" action="{{route('settings.update', $setting->id)}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <h5>{{__('dashboard.setting_edit')}}</h5>
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
                                <label for="brand_name" class="col-sm-3 text-right control-label col-form-label">{{__('site.name')}}</label>
                                <div class="col-sm-9">
                                    <input name="name" value="{{$setting->name??old('name')}}" type="text" class="form-control" id="brand_name" placeholder="{{__('site.name')}}">
                                </div>
                            </div>
                            @if($setting->type == 'image')
                                <div class="form-group row">
                                    <label for="category_name" class="col-sm-3 text-right control-label col-form-label">{{__('dashboard.image')}}</label>
                                    <div class="col-md-9">
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input" id="validatedCustomFile" >
                                            <label  class="custom-file-label" for="validatedCustomFile">{{__('dashboard.image')}}...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                            <div class="custom-file">
                                                <img style="margin-bottom:50px;width: 100px; height: 80px" src="{{@$setting->image->url?(str_contains(@$setting->image->url, 'settings')?'/storage/'.@$setting->image->url:@$setting->image->url):asset('assets/site/images/default.png')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif($setting->type == 'textarea')
                                <div class="form-group row">
                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">{{__('dashboard.value_en')}}</label>
                                    <div class="col-sm-8">
                                        <textarea style="height: 100px" name="value_en" class="form-control" placeholder="{{__('dashboard.value_en')}}">{{$product->value_en??old('value_en')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">{{__('dashboard.value_ar')}}</label>
                                    <div class="col-sm-8">
                                        <textarea style="height: 100px" name="value_ar" class="form-control" placeholder="{{__('dashboard.value_ar')}}">{{$product->value_ar??old('value_ar')}}</textarea>
                                    </div>
                                </div>
                            @else
                                <div class="form-group row">
                                    <label for="value_en" class="col-sm-3 text-right control-label col-form-label">{{__('dashboard.value_en')}}</label>
                                    <div class="col-sm-9">
                                        <input name="value_en" value="{{$setting->value_en??old('value_en')}}" type="text" class="form-control" id="value_en" placeholder="{{__('dashboard.value_en')}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="value_ar" class="col-sm-3 text-right control-label col-form-label">{{__('dashboard.value_ar')}}</label>
                                    <div class="col-sm-9">
                                        <input name="value_ar" value="{{$setting->value_ar??old('value_ar')}}" type="text" class="form-control" id="value_ar" placeholder="{{__('dashboard.value_ar')}}">
                                    </div>
                                </div>
                            @endif
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
