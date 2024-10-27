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
    <h1 class="text-center">Empleado escogido</h1><br>
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
            <tr>
                <td><?php echo e($persona->name); ?></td>
                <td><?php echo e($persona->lastname); ?></td>
                <td><?php echo e($persona->birthdate); ?></td>
                <td><?php echo e($persona->email); ?></td>

            </tr>
        </tbody>
    </table>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\proyecto_laravel\resources\views/components/user.blade.php ENDPATH**/ ?>