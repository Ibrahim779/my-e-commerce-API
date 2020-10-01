@extends('layouts.dashboard')
@section('css')
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('page_title', __('dashboard.sliders'))
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
                    <th>{{__('dashboard.title')}}</th>
                    <th>{{__('dashboard.image')}}</th>
                    <th>{{__('dashboard.action')}}</th>
                </tr>
                </thead>
                <tbody>
            @foreach($sliders as $slider)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$slider->title}}</td>
                    <td>
                        <img style="width: 50px;height: auto" src="{{@$slider->image->url?(str_contains(@$slider->image->url, 'sliders')?'/storage/'.@$slider->image->url:@$slider->image->url):asset('assets/site/images/default.png')}}" alt="slider image">
                    </td>
                    <td>
                        <a href="{{route('sliders.edit', $slider->id)}}">
                            <button type="button" class="btn btn-cyan btn-sm">{{__('dashboard.edit')}}</button>
                        </a>
                        <form method="post"  action="{{route('sliders.destroy', $slider->id )}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">{{__('dashboard.delete')}}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
                </tbody>
            </table>
            <a href="{{route('sliders.create')}}">
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
