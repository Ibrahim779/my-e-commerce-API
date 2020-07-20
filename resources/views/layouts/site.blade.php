<!DOCTYPE html>
<html lang="en">
<head>
    @include('site.includes.meta')
    @include('site.includes.style')

</head>
<body class="goto-here">
    @include('site.includes.nav')
    @yield('content')
    @include('site.includes.footer')
    @include('site.includes.script')
</body>
</html>
