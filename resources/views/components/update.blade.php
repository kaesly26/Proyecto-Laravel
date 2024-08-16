<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/miestilo.css') }}" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Actualizar</title>
</head>

<body>
    <div class="div">
        <h1>Actualizar registro</h1>
        <form action="{{ route('personas.update', $editar->id)}}" method="post" enctype="multipart/form-data" class="border border-1">
            @csrf
            @method("PUT")
            <legend>Formulario para actualizar</legend>
            <div class="mb-3">
                <label class="form-label">Nombre</label><br>
                <input type="text" name="name" value="{{$editar->name}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Apellido</label><br>
                <input type="text" name="lastname" value="{{$editar->lastname}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de nacimiento</label><br>
                <input type="date" name="birthdate" value="{{$editar->birthdate}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label><br>
                <input type="text" name="email" value="{{$editar->email}}">
            </div>
            <div class="mb-3">
                <label for="user_photo">Foto de perfil</label><br>
                <img src="{{Storage::url($editar->user_photo)}}" alt="foto perfil" width="40px" height="40px">
                <input type="file" name="user_photo" value="{{$editar->user_photo}}">
            </div>
            <button type="submit" class="btn btn-color">Actualizar</button>
            <a href="{{ route('personas.index')}}" class="btn">Cancelar</a>
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

    input {
        width: 300px;
    }
</style>

</html>