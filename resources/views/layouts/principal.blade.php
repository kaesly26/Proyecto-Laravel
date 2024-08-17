<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Menu principal')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <div class="container">
        <img src="img/Russo.png" alt="" height="150px" width="150px">
    </div>

    <nav class="nav">
        <ul class="list">

            <li class="list__item">
                <div class="list__button">
                    <img src="assets/dashboard.svg" class="list__img">
                    <a href="#" class="nav__link">Inicio</a>
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
                        <a href="{{route('categoria')}}" class="nav__link nav__link--inside">Categorias</a>
                    </li>

                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Crear Producto</a>
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
                    <a href="{{ route('admin.ingresar')}}" class="nav__link">Clientes</a>
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

    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('js/main.js')}}"></script>
</body>

</html>