<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="me" content="{{ \Illuminate\Support\Facades\Auth::id() }}">
    <title>Soho - Chat and Discussion Platform</title>

    <!-- Favicon -->
    <link rel="icon" href="./dist/media/img/favicon.png" type="image/png">

    <!-- Soho css -->
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- JQuery -->
    <script src="{{URL::asset('vendor/jquery-3.4.1.min.js')}}"></script>

</head>
<body class="dark">

@yield('content')
<script>

</script>

<!-- Popper.js -->
<script src="{{URL::asset('vendor/popper.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{URL::asset('vendor/bootstrap/bootstrap.min.js')}}"></script>

<!-- Nicescroll -->
<script src="{{URL::asset('vendor/jquery.nicescroll.min.js')}}"></script>


<!-- Soho -->
<script src="{{URL::asset('assets/js/main.js')}}"></script>

<!-- Examples -->
<script src="{{URL::asset('assets/js/examples.js')}}"></script>

<!-- Scripts -->

<script src="{{URL::asset('assets/js/chat.js')}}"></script>
</body>
</html>