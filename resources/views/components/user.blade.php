<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <title>PDF</title>
</head>

<body>
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
                <td>{{$persona->name}}</td>
                <td>{{$persona->lastname}}</td>
                <td>{{$persona->birthdate}}</td>
                <td>{{$persona->email}}</td>

            </tr>
        </tbody>
    </table>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>