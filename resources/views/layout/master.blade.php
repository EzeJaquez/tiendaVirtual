<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Ocean - @yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('style_admin/layout.css') }}">
</head>
<body>
    @section('header')
    <h5 class='prueba'>Aqui va la cabecera de la web (Todos)</h5>
    @show
    <div class='container'>
        @yield('content')
    </div>
    @section('footer')
        <h5 class='prueba'>pie de pagina</h5>
    @show
</body>
</html>