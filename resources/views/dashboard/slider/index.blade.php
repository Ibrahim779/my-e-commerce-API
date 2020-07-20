@extends('layouts.dashboard')
@section('css')
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('page_title','Sliders')
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
                    <th>Title</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
            @foreach($sliders as $slider)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$slider->title}}</td>
                    <td>
                        <img style="width: 50px;height: auto" src="{{url('storage/'.@$slider->image->url)}}" alt="slider image">
                    </td>
                    <td>
                        <a href="{{route('sliders.edit', $slider->id)}}">
                            <button type="button" class="btn btn-cyan btn-sm">Edit</button>
                        </a>
                        <a href="{{route('sliders.destroy', $slider->id )}}">
                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                        </a>
                    </td>
                </tr>
            @endforeach
                </tbody>
            </table>
            <a href="{{route('sliders.create')}}">
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
