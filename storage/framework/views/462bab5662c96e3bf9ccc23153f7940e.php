<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Crear</title>
</head>

<body>

    <div class="div">
        <h1>Crear nuevo registro</h1>
        <form action="<?php echo e(route('personas.store')); ?>" method="post" enctype="multipart/form-data" class="border border-1 ">
            <?php echo csrf_field(); ?>
            <legend>Formulario para nuevo registro</legend>
            <div class="mb-3">
                <label class="form-label">Nombre</label><br>
                <input type="text" name="name" placeholder="Name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Apellido</label><br>
                <input type="text" name="lastname" placeholder="Lastename" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de nacimiento</label><br>
                <input type="date" name="birthdate" placeholder="birthdate" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Correo</label><br>
                <input type="text" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <label for="user_photo">Foto de perfil</label><br>
                <input type="file" name="user_photo">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="<?php echo e(route('personas.index')); ?>" class="btn">Cancel</a>
        </form>
    </div>

</body>
<style>
    .div {
        padding: 10px;
        margin: 40px;
    }

    form {
        width: 450px;
        padding: 16px;
        border-radius: 10px;
        margin: 40px auto;
    }
</style>

</html><?php /**PATH C:\xampp\htdocs\proyecto_laravel\resources\views\components\create.blade.php ENDPATH**/ ?>