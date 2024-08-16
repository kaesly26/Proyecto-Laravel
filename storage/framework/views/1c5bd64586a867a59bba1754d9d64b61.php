<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <title>PDF</title>
</head>

<body>
    <div>
        <img src="img/images.png" height="90px" width="90px">
    </div>
    <h1 class="text-center">Lista de empleados</h1><br>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de nacimiento</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $persona; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($person->name); ?></td>
                <td><?php echo e($person->lastname); ?></td>
                <td><?php echo e($person->birthdate); ?></td>
                <td><?php echo e($person->email); ?></td>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\proyecto_laravel\resources\views/components/pdf.blade.php ENDPATH**/ ?>