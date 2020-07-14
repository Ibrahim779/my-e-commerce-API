@extends('layouts.dashboard')
@section('css')
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('page_title','Products| Edit')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="post" action="{{route('products.categories.update', ['category' => $category, 'product' => $product->id])}}" class="form-horizontal" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                      <div class="card-body">
                        <h5>Products Edit</h5>
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
                            <label for="category_name" class="col-sm-3 text-right control-label col-form-label">Product Name</label>
                            <div class="col-sm-9">
                                <input name="name" value="{{$product->name??old('name')}}" type="text" class="form-control" id="category_name" placeholder="Product Name Here">
                            </div>
                        </div>
                          <div class="form-group row">
                              <label for="category_name" class="col-sm-3 text-right control-label col-form-label">Products Quantity</label>
                              <div class="col-sm-9">
                                  <input name="quantity" value="{{$product->quantity??old('quantity')}}" type="text" class="form-control" id="category_quantity" placeholder="Product Quantity Here">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="category_name" class="col-sm-3 text-right control-label col-form-label">Products Price</label>
                              <div class="col-sm-9">
                                  <input name="price" value="{{$product->price??old('price')}}" type="text" class="form-control" id="category_name" placeholder="Product Price Here">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="category_name" class="col-sm-3 text-right control-label col-form-label">Products Discount</label>
                              <div class="col-sm-9">
                                  <input name="discount" value="{{$product->discount??old('discount')}}" type="text" class="form-control" id="category_name" placeholder="Product Discount Here">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="category_name" class="col-sm-3 text-right control-label col-form-label">Products Bar Code</label>
                              <div class="col-sm-9">
                                  <input name="bar_code" value="{{$product->bar_code??old('bar_code')}}" type="text" class="form-control" id="category_name" placeholder="Product Bar Code Here">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-sm-3"></label>
                              <div class="col-md-9">
                                  <div class="custom-control custom-checkbox mr-sm-2">
                                      <input name="is_published" {{$product->is_published?'checked':''}} type="checkbox" class="custom-control-input" id="is_published">
                                      <label class="custom-control-label" for="is_published">Published</label>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-sm-3 text-right control-label col-form-label">SubCategory</label>
                              <div class="col-md-9">
                                  <select name="subcategory_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                      <option value="{{null}}">Select</option>
                                      @foreach($subcategories as $subcategory)
                                          <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                      @endforeach
                                  </select>

                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-sm-3 text-right control-label col-form-label">Brand</label>
                              <div class="col-md-9">
                                  <select name="brand_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                      <option value="{{null}}">Select</option>
                                      @foreach($brands as $brand)
                                          <option value="{{$brand->id}}">{{$brand->name}}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-sm-3"></label>
                              <div class="col-md-9">
                                  <div class="custom-control custom-checkbox mr-sm-2">
                                      <input {{$product->is_offer?'checked':''}} name="is_offer" type="checkbox" class="custom-control-input" id="Offer">
                                      <label class="custom-control-label" for="Offer">Offer</label>
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
    <script src="{{asset('assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{asset('assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
    <script src="{{asset('assets/extra-libs/DataTables/datatables.min.js')}}"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

@endsection
