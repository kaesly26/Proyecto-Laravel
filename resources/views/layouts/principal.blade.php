<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Menu principal')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<header>
    <div class="container">
        <img src="img/Russo.png" alt="" height="150px" width="150px">
    </div>
    <div class="form-logout dropdown">
        <button class="btn logout dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            @if(Auth::check())
            {{ Auth::user()->name_user }}
            @endif
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li>
                <form action="{{route('logout')}}" method="get">
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </li>
        </ul>
    </div>
    <nav class="nav">
        <ul class="list">

            <li class="list__item">
                <div class="list__button">
                    <img src="assets/dashboard.svg" class="list__img">
                    <a href="{{ route('principal') }}" class="nav__link">Inicio</a>
                </div>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="assets/docs.svg" class="list__img">
                    <a href="#" class="nav__link">Productos</a>
                    <img src="assets/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="{{route('lista')}}" class="nav__link nav__link--inside">Categorias</a>
                    </li>

                    <li class="list__inside">
                        <a href="{{ route('crearProducto')}}" class="nav__link nav__link--inside">Productos</a>
                    </li>
                </ul>

            </li>


            <li class="list__item">
                <div class="list__button">
                    <img src="assets/stats.svg" class="list__img">
                    <a href="#" class="nav__link">Servicios</a>
                </div>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="assets/bell.svg" class="list__img">
                    <a href="#" class="nav__link">Pedidos</a>
                    <img src="assets/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside"></a>
                    </li>

                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Pedidos Pendientes </a>
                    </li>

                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Nuevos Pedido </a>
                    </li>

                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Reporte de Pedidos </a>
                    </li>
                </ul>

            </li>

            <li class="list__item">
                <div class="list__button">
                    <img src="assets/message.svg" class="list__img">
                    <a href="{{ route('personas.index')}}" class="nav__link">Clientes</a>
                </div>
            </li>

            <li class="list__item">
                <div class="list__button">
                    <img src="assets/message.svg" class="list__img">
                    <a href="#" class="nav__link">Contacto</a>
                </div>
            </li>

        </ul>
    </nav>

</header>

<body>

    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js')}}"></script>
    @yield('scripts')
</body>

</html>