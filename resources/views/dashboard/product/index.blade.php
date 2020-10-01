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
                    <th>{{__('site.name')}}</th>
                    <th>{{__('dashboard.image')}}</th>
                    <th>{{__('site.quantity')}}</th>
                    <th>{{__('site.price')}}</th>
                    <th>{{__('site.discount')}}</th>
                    <th>{{__('site.bar_code')}}</th>
                    <th>{{__('site.count')}}</th>
                    <th>{{__('dashboard.action')}}</th>
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
                    <td>
                        @if($product->discount)
                            <span style="text-decoration: line-through;">{{$product->price}}</span>  <span style="color: #ffbe08 ">{{$product->discount_price}} {{__('site.currency')}}</span>
                        @else
                            <span style="color: #ffbe08 ">{{$product->price}} {{__('site.currency')}}</span>
                        @endif
                    </td>
                    <td>{{$product->discount??__('site.null')}}%</td>
                    <td>{{$product->bar_code}}</td>
                    <td class="quantity">
                        <form method="post" action="{{route('products.updateCount', $product->id)}}" class="subscribe-form">
                            @csrf
                            @method('PATCH')
                            <div class="form-group d-flex">
                                <input min="0" style="width: 100px;" value="{{$product->count}}" name="count" type="number" class="form-control" placeholder="{{__('site.count')}}">
                                <input type="submit" value="{{__('site.change')}}" class="submit px-3">
                            </div>
                        </form>
                    </td>

                    <td>
                        <a href="{{route('products.categories.edit', ['category' => $category,'product' => $product->id])}}">
                            <button type="button" class="btn btn-cyan btn-sm">{{__('dashboard.edit')}}</button>
                        </a>
                        <a href="{{route('products.published', $product->id)}}">
                            <button type="button" class="btn btn-success btn-sm">
                                {{$product->is_published? __('dashboard.unpublished') : __('dashboard.published')}}
                            </button>
                        </a>
                        @if($product->discount)
                        <a href="{{route('products.removeDiscount', $product->id)}}">
                            <button type="button" class="btn btn-success btn-sm">
                                {{__('dashboard.remove_discount')}}
                            </button>
                        </a>
                        @endif
                        <form class="mt-1" method="post"  action="{{route('products.destroy', $product->id )}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">{{__('dashboard.delete')}}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{route('products.categories.create',$category)}}">
                <button type="button" class="pr-5 pl-5 btn btn-cyan btn-md">{{__('dashboard.add')}}</button>
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
