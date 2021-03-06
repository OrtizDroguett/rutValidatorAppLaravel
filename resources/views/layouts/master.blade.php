<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    @yield('estilos')
</head>
<body>
    @include('layouts.componentes.navbar')
    @yield('contenido')
</body>
</html>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-3.5.1.js')}}"></script>
@yield('scripts')
