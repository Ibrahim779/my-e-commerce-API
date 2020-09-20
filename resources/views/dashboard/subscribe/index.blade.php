@extends('layouts.dashboard')
@section('css')
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('assets/dashboard/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('page_title', __('dashboard.subscribes'))

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
                    <th>{{__('site.email')}}</th>
                    <th>{{__('dashboard.action')}}</th>
                </tr>
                </thead>
                <tbody>
            @foreach($subscribes as $subscribe)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$subscribe->email}}</td>
                    <td>
                        <form method="post" action="{{route('subscribes.destroy',  $subscribe->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                {{__('dashboard.delete')}}
                            </button>
                        </form>
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
