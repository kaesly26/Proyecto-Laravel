<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/alertify.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <title>proyecto Laravel</title>

</head>

<body>
    <center>
        <h1>Bienvenido</h1>
        <br>
        <h1>Tabla personas</h1>
    </center>
    <form action="<?php echo e(route('logout')); ?>" class="logout-conteiner">
        <button class="btn btn-primary logout" type="submit">Logout</button>
    </form>
    <div class="div">
        <a href="<?php echo e(route('personas.create')); ?>" class="btn btn-primary"> <i class="fa-solid fa-person-circle-plus"></i> Agregar nuevo registro</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Foto de perfil</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de nacimiento</th>
                    <th>Correo</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $registros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><img src="<?php echo e(Storage::url($registro->user_photo)); ?>" alt="foto perfil" width="60px" height="60px"></td>
                    <td><?php echo e($registro->name); ?></td>
                    <td><?php echo e($registro->lastname); ?></td>
                    <td><?php echo e($registro->birthdate); ?></td>
                    <td><?php echo e($registro->email); ?></td>
                    <td>
                        <button type="submit" class="btn btn-danger" onclick="confirmDelete('<?php echo e($registro->id); ?>')"><i class="fa-solid fa-trash"></i> Eliminar</button>
                    </td>
                    <td>
                        <form action="<?php echo e(route('personas.edit', $registro->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <?php echo e($registros-> links()); ?>

        </div>
    </div>
</body>
<script>
    function confirmDelete(id) {
        alertify.confirm("¿Deseas eliminar este registro?", function(e) {
            if (e) {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = '/personas/' + id;
                form.innerHTML = '<?php echo csrf_field(); ?> <?php echo method_field("DELETE"); ?>';
                document.body.appendChild(form);
                form.submit();
            } else {
                alertify.error('Cancelar');
                return false;
            }
        });
    }
</script>
<style>
    .div {
        padding: 20px 20px;
        margin: 40px 30px;

    }

    a {
        margin: 10px auto;
    }

    body {
        background: lightblue;
    }

    .logout-conteiner {
        display: flex;
        justify-content: flex-end;

    }
    .logout{
        margin: 30px;
    }
</style>
<html><?php /**PATH C:\xampp\htdocs\proyecto_laravel\resources\views\home.blade.php ENDPATH**/ ?>