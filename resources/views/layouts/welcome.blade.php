<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/principal.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>@yield('title', 'Bienvenido')</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark ">
        <h1 class="title"><a class="item" href="{{ url('/') }}">Bienvenido</a></h1>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="item" href="{{route('admin.show.login')}}">iniciar sesion</a>
            </li>
            <li class="nav-item">
                <a class="item" href="{{route('show.register')}}">Registrarse</a>
            </li>
        </ul>
    </nav>
</header>

<body>

    <div class="container">
        @yield('content')
    </div>

</body>

</html>