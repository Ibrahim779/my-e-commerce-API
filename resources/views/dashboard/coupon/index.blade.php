@extends('layouts.dashboard')
@section('css')
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('assets/dashboard/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('page_title','Coupons')
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
                    <th>Code</th>
                    <th>Discount</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
            @foreach($coupons as $coupon)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$coupon->code}}</td>
                    <td>
                        {{$coupon->discount}}
                    </td>

                    <td>
                        <a href="{{route('coupons.edit', $coupon->id)}}">
                            <button type="button" class="btn btn-cyan btn-sm">Edit</button>
                        </a>
                        <a href="{{route('coupons.destroy', $coupon->id )}}">
                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                        </a>
                    </td>
                </tr>
            @endforeach
                </tbody>
            </table>
            <a href="{{route('coupons.create')}}">
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
