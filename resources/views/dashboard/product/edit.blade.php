@extends('layouts.dashboard')
@section('css')
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('assets/dashboard/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('page_title', __('site.products').' | '.__('dashboard.edit'))
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="post" action="{{route('products.categories.update', ['category' => $category, 'product' => $product->id])}}" class="form-horizontal" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                      <div class="card-body">
                        <h5>{{__('dashboard.product_edit')}}</h5>
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
                            <label for="category_name" class="col-sm-3 text-right control-label col-form-label">{{__('site.name')}}</label>
                            <div class="col-sm-9">
                                <input name="name" value="{{$product->name??old('name')}}" type="text" class="form-control" id="category_name" placeholder="{{__('site.name')}}">
                            </div>
                        </div>
                          <div class="form-group row">
                              <label for="category_name" class="col-sm-3 text-right control-label col-form-label">{{__('site.bar_code')}}</label>
                              <div class="col-sm-9">
                                  <input name="bar_code" value="{{$product->bar_code??old('bar_code')}}" type="text" class="form-control" id="category_name" placeholder="{{__('site.bar_code')}}">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="category_name" class="col-sm-3 text-right control-label col-form-label">{{__('site.price')}}</label>
                              <div class="col-sm-9">
                                  <input name="price" value="{{$product->price??old('price')}}" type="number" class="form-control" id="category_name" placeholder="{{__('site.price')}}">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="category_name" class="col-sm-3 text-right control-label col-form-label">{{__('site.quantity')}}</label>
                              <div class="col-sm-9">
                                  <input name="quantity" value="{{$product->quantity??old('quantity')}}" type="text" class="form-control" id="category_quantity" placeholder="{{__('site.quantity')}}">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="count" class="col-sm-3 text-right control-label col-form-label">{{__('site.count')}}</label>
                              <div class="col-sm-9">
                                  <input min="0" name="count" value="{{$product->count??old('count')}}" type="number" class="form-control" id="count" placeholder="{{__('site.count')}}">
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="category_name" class="col-sm-3 text-right control-label col-form-label">{{__('site.discount')}} %</label>
                              <div class="col-sm-9">
                                  <input name="discount" value="{{$product->discount??old('discount')}}" type="number" class="form-control" id="category_name" placeholder="{{__('site.discount')}}">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="category_name" class="col-sm-3 text-right control-label col-form-label">{{__('dashboard.image')}}</label>
                              <div class="col-md-9">
                                  <div class="custom-file">
                                      <input name="image" type="file" class="custom-file-input" id="validatedCustomFile" >
                                      <label  class="custom-file-label" for="validatedCustomFile">{{__('dashboard.image')}}...</label>
                                      <div class="invalid-feedback">Example invalid custom file feedback</div>
                                      <div class="custom-file">
                                          <img style="margin-bottom:50px;width: 100px; height: 80px" src="{{@$product->image->url?(str_contains(@$product->image->url, 'products')?'/storage/'.@$product->image->url:@$product->image->url):asset('assets/site/images/default.png')}}">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-sm-3"></label>
                              <div class="col-md-9">
                                  <div class="custom-control custom-checkbox mr-sm-2">
                                      <input name="is_published" {{$product->is_published?'checked':''}} type="checkbox" class="custom-control-input" id="is_published">
                                      <label class="custom-control-label" for="is_published">{{__('dashboard.published')}}</label>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-sm-3 text-right control-label col-form-label">{{__('dashboard.subcategory')}}</label>
                              <div class="col-md-9">
                                  <select name="subcategory_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                      <option  value="{{null}}">{{__('dashboard.subcategory')}}</option>
                                      @foreach($subcategories as $subcategory)
                                          <option {{old('subcategory_id')|$product->subcategory_id == $subcategory->id?'selected':''}} value="{{$subcategory->id}}">{{$subcategory->name}}</option>
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
                                          <option {{old('brand_id')|$product->brand_id == $brand->id?'selected':''}} value="{{$brand->id}}">{{$brand->name}}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="cono1" class="col-sm-3 text-right control-label col-form-label">{{__('dashboard.description')}}</label>
                              <div class="col-sm-8">
                                    <textarea style="height: 100px" name="description" class="form-control" placeholder="{{__('dashboard.description')}}">{{$product->discription??old('description')}}</textarea>
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
