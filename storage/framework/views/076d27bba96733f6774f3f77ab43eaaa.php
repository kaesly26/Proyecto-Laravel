<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Eliminar</title>
</head>

<body>
    <div>
        <h1>Eliminar Registro</h1>
        <div class="border border-1 margin:'20px'">
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
                    <tr>
                        <td><img src="<?php echo e(Storage::url($personas->user_photo)); ?>" alt="foto perfil" width="50px" height="50px"></td>
                        <td><?php echo e($personas->name); ?></td>
                        <td><?php echo e($personas->lastname); ?></td>
                        <td><?php echo e($personas->birthdate); ?></td>
                        <td><?php echo e($personas->email); ?></td>
                        <td>
                            <button type="submit" class="btn btn-danger" onclick="confirmDelete('<?php echo e($personas->id); ?>')"><i class="fa-solid fa-trash"></i> Eliminar</button>
                        </td>
                        <td>
                            <a href="<?php echo e(route('personas.index')); ?>" class="btn">Cancelar</a>
                        </td>

            </table>
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

</html><?php /**PATH C:\xampp\htdocs\proyecto_laravel\resources\views\components\delete.blade.php ENDPATH**/ ?>