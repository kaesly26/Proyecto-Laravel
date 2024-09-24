<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Menu principal'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/alertify.min.css" />
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />
</head>
<header>
    <div class="container">
        <img src="<?php echo e(asset('img/Russo.png')); ?>" alt="" height="150px" width="150px">
    </div>
    <div class="form-logout dropdown">
        <button class="btn logout dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <?php if(Auth::check()): ?>
            <?php echo e(Auth::user()->name_user); ?>

            <?php endif; ?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li>
                <form action="<?php echo e(route('logout')); ?>" method="get">
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </li>
        </ul>
    </div>
    <nav class="nav">
        <ul class="list">

            <li class="list__item">
                <div class="list__button">
                    <img src="<?php echo e(asset('assets/dashboard.svg')); ?>" class="list__img">
                    <a href="<?php echo e(route('principal')); ?>" class="nav__link">Inicio</a>
                </div>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="<?php echo e(asset('assets/docs.svg')); ?>" class="list__img">
                    <a href="#" class="nav__link">Productos</a>
                    <img src="<?php echo e(asset('assets/arrow.svg')); ?>" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="<?php echo e(route('categoria.index')); ?>" class="nav__link nav__link--inside">Categorias</a>
                    </li>

                    <li class="list__inside">
                        <a href="<?php echo e(route('productos.index')); ?>" class="nav__link nav__link--inside">Productos</a>
                    </li>
                </ul>

            </li>


            <li class="list__item">
                <div class="list__button">
                    <img src="<?php echo e(asset('assets/stats.svg')); ?>" class="list__img">
                    <a href="#" class="nav__link">Servicios</a>
                </div>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="<?php echo e(asset('assets/bell.svg')); ?>" class="list__img">
                    <a href="#" class="nav__link">Pedidos</a>
                    <img src="<?php echo e(asset('assets/arrow.svg')); ?>" class="list__arrow">
                </div>

                <ul class="list__show">
                
                    <li class="list__inside">
                        <a href="<?php echo e(route('pedidos.index')); ?>" class="nav__link nav__link--inside">Nuevos Pedidos </a>
                    </li>

                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Reporte de Pedidos </a>
                    </li>
                </ul>

            </li>

            <li class="list__item">
                <div class="list__button">
                    <img src="<?php echo e(asset('assets/message.svg')); ?>" class="list__img">
                    <a href="<?php echo e(route('personas.index')); ?>" class="nav__link">Clientes</a>
                </div>
            </li>

            <li class="list__item">
                <div class="list__button">
                    <img src="<?php echo e(asset('assets/message.svg')); ?>" class="list__img">
                    <a href="#" class="nav__link">Contacto</a>
                </div>
            </li>

        </ul>
    </nav>

</header>

<body>

    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
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
    </script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\proyecto_laravel\resources\views/layouts/principal.blade.php ENDPATH**/ ?>