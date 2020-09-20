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
@section('page_title', __('site.products').' | '.__('dashboard.add'))
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="post" action="{{route('products.categories.store', $category)}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <h5>{{__('dashboard.product_add')}}</h5>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="material-icons">{{__('site.close')}}</i>
                                    </button>
                                    <span>
                        {{$errors->first()}}
                    </span>
                                </div>
                            @endif
                            <div class="form-group row">
                                <label for="category_name" class="col-sm-3 text-right control-label col-form-label">{{__('site.name')}}</label>
                                <div class="col-sm-9">
                                    <input name="name" value="{{old('name')}}" type="text" class="form-control" id="category_name" placeholder="{{__('site.name')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category_name" class="col-sm-3 text-right control-label col-form-label">{{__('site.bar_code')}}</label>
                                <div class="col-sm-9">
                                    <input name="bar_code" value="{{old('bar_code')}}" type="text" class="form-control" id="category_name" placeholder="{{__('site.bar_code')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category_name" class="col-sm-3 text-right control-label col-form-label">{{__('site.price')}}</label>
                                <div class="col-sm-9">
                                    <input name="price" value="{{old('price')}}" type="text" class="form-control" id="category_name" placeholder="{{__('site.price')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category_name" class="col-sm-3 text-right control-label col-form-label">{{__('site.quantity')}}</label>
                                <div class="col-sm-9">
                                    <input name="quantity" value="{{old('quantity')}}" type="text" class="form-control" id="category_quantity" placeholder="{{__('site.quantity')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="count" class="col-sm-3 text-right control-label col-form-label">{{__('site.count')}}</label>
                                <div class="col-sm-9">
                                    <input name="count" value="{{old('count')}}" type="number" class="form-control" id="count" placeholder="{{__('site.count')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category_name" class="col-sm-3 text-right control-label col-form-label">{{__('site.discount')}} %</label>
                                <div class="col-sm-9">
                                    <input name="discount" value="{{old('discount')}}" type="text" class="form-control" id="category_name" placeholder="{{__('site.discount')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category_name" class="col-sm-3 text-right control-label col-form-label">{{__('dashboard.image')}}</label>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input name="image" type="file" class="custom-file-input" id="validatedCustomFile" required>
                                        <label  class="custom-file-label" for="validatedCustomFile">{{__('dashboard.image')}}...</label>
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"></label>
                                <div class="col-md-9">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input checked name="is_published" type="checkbox" class="custom-control-input" id="customControlAutosizing1">
                                        <label class="custom-control-label" for="customControlAutosizing1">{{__('dashboard.published')}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">{{__('dashboard.subcategory')}}</label>
                                <div class="col-md-9">
                                    <select name="subcategory_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                        <option  value="{{null}}">{{__('dashboard.subcategory')}}</option>
                                        @foreach($subcategories as $subcategory)
                                            <option {{old('subcategory_id') == $subcategory->id?'selected':''}} value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                            @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">{{__('dashboard.brand')}}</label>
                                <div class="col-md-9">
                                    <select name="brand_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                        <option  value="{{null}}">{{__('dashboard.brand')}}</option>
                                        @foreach($brands as $brand)
                                        <option {{old('brand_id') == $brand->id?'selected':''}} value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">{{__('dashboard.description')}}</label>
                            <div class="col-sm-8">
                                    <textarea style="height: 100px" name="description" class="form-control" placeholder="{{__('dashboard.description')}}">{{old('description')}}</textarea>
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
