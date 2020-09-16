@extends('layouts.dashboard')
@section('css')
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('assets/dashboard/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('page_title','Orders')
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
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Total</th>
                    <th>Payment Status</th>
                    <th>Order Status</th>
                    <th>Action</th>
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
                    <td>{{$order->payment_status==0 ? 'الدفع عند الاستلام':'تم الدفع'}}</td>
                    <td>{{$order->status}}</td>
                    <td>
                        <a href="{{route('orders.show', $order->id)}}">
                            <button type="button" class="btn btn-cyan btn-sm">show</button>
                        </a>
                        <a href="{{route('orders.destroy', $order->id)}}">
                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
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
