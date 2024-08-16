<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title><?php echo $__env->yieldContent('title', 'Bienvenido'); ?></title>
    <style>
        .div {
            padding: 10px;
            margin: 40px;
        }

        .login-page {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;

        }

     
        form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        nav {
            background: blue;
            display: flex;
            padding: 5px;
            margin: 1px;
        }

        ul {
            display: flex;
        }

        .title {
            margin: 5px;
            color: white;
        }

        li {
            background: lightskyblue;
            display: inline-flex;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 4px;
        }

        li:hover {
            background: lightblue;
            color: white;
        }

        .item {
            text-decoration: none;
            color: white;
        }

        .form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
        }

        .message a {
            text-decoration: none;
        }
    </style>

</head>

<body>
    <center>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <h1 class="title"><a class="item" href="<?php echo e(url('/')); ?>">Bienvenido</a></h1>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="item" href="<?php echo e(route('admin.show.login')); ?>">iniciar sesion</a>
                </li>
                <li class="nav-item">
                    <a class="item" href="<?php echo e(route('show.register')); ?>">Registrarse</a>
                </li>
            </ul>

        </nav>

        <div class="container">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

    </center>


</body>

</html><?php /**PATH C:\xampp\htdocs\proyecto_laravel\resources\views\layouts\welcome.blade.php ENDPATH**/ ?>