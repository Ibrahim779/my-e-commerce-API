@extends('layouts.dashboard')
@section('css')
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('assets/dashboard/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('page_title', __('dashboard.cities'))
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
                    <th>{{__('site.shipping')}}</th>
                    <th>{{__('dashboard.action')}}</th>
                </tr>
                </thead>
                <tbody>
            @foreach($cities as $city)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$city->name}}</td>
                    <td>
                        {{$city->shipping}} {{__('site.currency')}}
                    </td>

                    <td>
                        <a href="{{route('cities.edit', $city->id)}}">
                            <button type="button" class="btn btn-cyan btn-sm">{{__('dashboard.edit')}}</button>
                        </a>
                        <a href="{{route('cities.destroy', $city->id )}}">
                            <button type="button" class="btn btn-danger btn-sm">{{__('dashboard.delete')}}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
                </tbody>
            </table>
            <a href="{{route('cities.create')}}">
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
