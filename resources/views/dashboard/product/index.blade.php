@extends('layouts.dashboard')
@section('css')
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('assets/dashboard/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('page_title', $page_title)
@section('content')
 <div class="container-fluid">
   <div class="row">
    <div class="col-12">
       <div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Bar Code</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$product->name}}</td>
                    <td>
                        <img style="width: 50px;height: auto" src="{{@$product->image->url?(str_contains(@$product->image->url, 'products')?'/storage/'.@$product->image->url:@$product->image->url):asset('assets/site/images/default.png')}}" alt="category image">
                    </td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->discount??'null'}}%</td>
                    <td>{{$product->bar_code}}</td>

                    <td>
                        <a href="{{route('products.categories.edit', ['category' => $category,'product' => $product->id])}}">
                            <button type="button" class="btn btn-cyan btn-sm">Edit</button>
                        </a>
                        <a href="{{route('products.published', $product->id)}}">
                            <button type="button" class="btn btn-success btn-sm">
                                {{$product->is_published?'UnPublish':'Publish'}}
                            </button>
                        </a>
                        @if($product->discount)
                        <a href="{{route('products.removeDiscount', $product->id)}}">
                            <button type="button" class="btn btn-success btn-sm">
                                remove discount
                            </button>
                        </a>
                        @endif
                        <a href="{{route('products.destroy',  $product->id)}}">
                            <button type="button" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{route('products.categories.create',$category)}}">
                <button type="button" class="pr-5 pl-5 btn btn-cyan btn-md">Add</button>
            </a>
        </div>
    </div>
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
