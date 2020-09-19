@extends('layouts.dashboard')
@section('css')
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('assets/dashboard/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('page_title', __('site.orders'))
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
                    <th>{{__('site.address')}}</th>
                    <th>{{__('site.phone')}}</th>
                    <th>{{__('site.total')}}</th>
                    <th>{{__('site.payment_status')}}</th>
                    <th>{{__('site.order_status')}}</th>
                    <th>{{__('dashboard.action')}}</th>
                </tr>
                </thead>
                <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$order->name??$order->user->full_name}}</td>
                    <td>{{$order->address??$order->user->address}}</td>
                    <td>{{$order->phone??$order->user->phone}}</td>
                    <td>{{$order->total_price}}</td>
                    <td>{{__('site.'.$order->payment_status)}}</td>
                    <td><form method="post" action="{{route('orders.update', $order->id)}}" class="subscribe-form">
                            @csrf
                            @method('PATCH')
                            <div class="form-group d-flex">
                                <select name="status" style="border: none" class="input100">
                                    <option  value="{{null}}">select status</option>
                                    <option {{$order->status == 'pending'?'selected':''}} value="pending">{{__('site.pending')}}</option>
                                    <option {{$order->status == 'prepared'?'selected':''}} value="prepared">{{__('site.prepared')}}</option>
                                    <option {{$order->status == 'delivered'?'selected':''}} value="delivered">{{__('site.delivered')}}</option>
                                    <option {{$order->status == 'completed'?'selected':''}} value="completed">{{__('site.completed')}}</option>
                                </select>
                                <input type="submit" value="{{__('site.change')}}" class="submit px-3">
                            </div>
                        </form></td>
                    <td>
                        <a href="{{route('orders.show', $order->id)}}">
                            <button type="button" class="btn btn-cyan btn-sm">{{__('site.show')}}</button>
                        </a>
                        <a href="{{route('orders.destroy', $order->id)}}">
                            <button type="button" class="btn btn-danger btn-sm">{{__('dashboard.delete')}}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
                </tbody>
            </table>
        </div>
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
