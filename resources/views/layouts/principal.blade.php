<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Menu principal')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/alertify.min.css" />
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<header>
    <div class="container">
        <img src="{{ asset('img/Russo.png')}}" alt="" height="200px" width="240px">
    </div>
    <div class="form-logout dropdown">
        <button class="btn logout dropdown-toggle" style="background: #4E31AA; color: #F5F7F8" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            @if(Auth::check())
            {{ Auth::user()->name_user }}
            @endif
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li>
                <form action="{{route('logout')}}" method="get">
                    <button type="submit" class="dropdown-item ">Logout</button>
                </form>
            </li>
        </ul>
    </div>
    <nav class=" nav">
        <ul class="list">
            <li class="list__item">
                <div class="list__button">
                    <img src="{{asset('assets/dashboard.svg')}}" class="list__img">
                    <a href="{{ route('principal') }}" class="nav__link">Inicio</a>
                </div>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="{{ asset('assets/docs.svg')}}" class="list__img">
                    <a href="#" class="nav__link">Productos</a>
                    <img src="{{ asset('assets/arrow.svg')}}" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="{{route('categoria.index')}}" class="nav__link nav__link--inside">Categorias</a>
                    </li>

                    <li class="list__inside">
                        <a href="{{ route('productos.index')}}" class="nav__link nav__link--inside">Productos</a>
                    </li>
                </ul>

            </li>


            <li class="list__item">
                <div class="list__button">
                    <img src="{{ asset('assets/stats.svg')}}" class="list__img">
                    <a href="#" class="nav__link">Servicios</a>
                </div>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="{{ asset('assets/bell.svg')}}" class="list__img">
                    <a href="#" class="nav__link">Pedidos</a>
                    <img src="{{ asset('assets/arrow.svg')}}" class="list__arrow">
                </div>

                <ul class="list__show">

                    <li class="list__inside">
                        <a href="{{route('pedidos.index')}}" class="nav__link nav__link--inside">Nuevos Pedidos </a>
                    </li>

                    <li class="list__inside">
                        <a href="{{route('pedidos.create')}}" class="nav__link nav__link--inside">Entrada de pedidos</a>
                    </li>
                </ul>

            </li>

            <li class="list__item">
                <div class="list__button">
                    <img src="{{asset('assets/message.svg')}}" class="list__img">
                    <a href="{{ route('personas.index')}}" class="nav__link">Clientes</a>
                </div>
            </li>

            <li class="list__item">
                <div class="list__button">
                    <img src="{{asset('assets/message.svg')}}" class="list__img">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('[data-toggle="collapse"]');

            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = button.getAttribute('data-target');
                    const targetElement = document.querySelector(targetId);

                    if (targetElement.style.display === 'none' || !targetElement.style.display) {
                        targetElement.style.display = 'block';
                    } else {
                        targetElement.style.display = 'none';
                    }
                });
            });
        });

        function toggleMenu() {
            const nav = document.querySelector('.nav');
            nav.classList.toggle('open');
        }
    </script>
    @yield('scripts')
</body>

</html>