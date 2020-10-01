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
                    <th>{{__('dashboard.value_en')}}</th>
                    <th>{{__('dashboard.value_ar')}}</th>
                    <th>{{__('dashboard.action')}}</th>
                </tr>
                </thead>
                <tbody>
            @foreach($settings as $setting)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$setting->name}}</td>
                    <td>
                        @if($setting->type == 'image')
                            <img style="width: 50px;height: auto" src="{{@$setting->image->url?(str_contains(@$setting->image->url, 'settings')?'/storage/'.@$setting->image->url:@$setting->image->url):asset('assets/site/images/default.png')}}" alt="setting image">
                        @else
                        {{$setting->value_en??__('site.null')}}
                        @endif
                    </td>
                    <td>
                        {{$setting->value_ar??__('site.null')}}
                    </td>
                    <td>
                        <a class="float-left mr-2" href="{{route('settings.edit', $setting->id)}}">
                            <button type="button" class="btn btn-cyan btn-sm">{{__('dashboard.edit')}}</button>
                        </a>
                        <form method="post"  action="{{route('settings.destroy', $setting->id )}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">{{__('dashboard.delete')}}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
                </tbody>
            </table>
            <a href="{{route('settings.create')}}">
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
