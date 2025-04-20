<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Kasir Web</title>
   <link href="{{ asset('bootstrap-5.3.5-dist/css/bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ asset('bootstrap-icons-1.11.3/font/bootstrap-icons.min.css') }}" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center" style="width: 100vw; height: 100vh;">
   @yield('content')
   <script src="{{ asset('bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js') }}"></script>
   @include('sweetalert::alert')

</body>

</html>
