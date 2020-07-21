<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/dashboard/images/favicon.png')}}">
    <title>Matrix Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="{{asset('assets/dashboard/dist/css/style.min.css')}}" rel="stylesheet">
</head>

<body>

  @yield('content')

<script src="{{asset('assets/dashboard/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/dashboard/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('assets/dashboard/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
</script>

</body>
</html>
