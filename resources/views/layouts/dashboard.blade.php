<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    @include('dashboard.includes.meta')
    @include('dashboard.includes.style')
</head>

<body>
  @include('dashboard.includes.nav')
  @include('dashboard.includes.sidebar')
  @yield('content')
  @include('dashboard.includes.footer')
  @include('dashboard.includes.script')
</body>
</html>
