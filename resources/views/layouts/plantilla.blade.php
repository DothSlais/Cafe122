<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
</head>
<body>
    <header class="encabezado">
    @include('layouts.partials.header')
    </header>
    @yield('content')

    @yield('scripts') 
</body>
</html>