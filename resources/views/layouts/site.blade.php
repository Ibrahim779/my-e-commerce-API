<!DOCTYPE html>

<html dir="{{session('dir')}}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('site.includes.meta')
    @include('site.includes.style')

</head>
<body style="text-align: initial" class="goto-here">
    @include('site.includes.nav')
    @yield('content')
    <hr>
    @include('site.includes.subscribe')
    @include('site.includes.footer')
    @include('site.includes.script')
</body>
</html>
