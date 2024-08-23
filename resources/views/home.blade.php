<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/miestilo.css') }}" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/alertify.min.css" />
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Proyecto Laravel</title>
</head>

<header>
    <div class="navbar">
        <div class="container">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a href="" class="navbar-brand d-flex align-items-center text-white">
                        <strong>
                            <h1>Bienvenido</h1>
                        </strong>
                    </a>
                </li>
            </ul>
            <div class="dropdown">
                <button class="btn btn-menu dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false">
                    @if(Auth::check())
                    <a>{{ Auth::user()->name_user }}</a>
                    @endif
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li>
                        <a class="dropdown-item" href="{{route('logout')}}">
                            Logout
                        </a>
                    </li>
                    <li><a class="dropdown-item" href="">Something else here</a></li>
                </ul>
            </div>

        </div>
    </div>
</header>

<body>
    <div class="div">
        <div class="row">
            <div class="col-md-4">
                <div class="container-boton">
                    <form action="{{ route('personas.create')}}">
                        <button type="submit" class="btn btn-color">
                            <i class="fa-solid fa-person-circle-plus"></i>
                            Agregar nuevo registro
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="container-buscar">
                    <form class="d-flex" role="search" action="{{route('personas.index')}}" method="get">
                        <input class="form-control me-2" type="search" name="buscar">
                        <button class="btn btn-color btn-outline-light" type="submit" name="btn-buscar">Buscar</button>
                        <button type="submit" class="btn btn-color btn-outline-light mx-2">Cancelar</button>
                    </form>
                </div>
            </div>
            <div class="col-md-2">
                <div class="container-boton">
                    <form action="{{ route('pdf')}}" method="get" target="_blank">
                        @csrf
                        <button type="submit" class="btn btn-color">Archivo PDF</button>
                    </form>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped">
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
                @foreach ($registros as $registro)
                <tr>
                    <td><img src="{{ $registro->user_photo_url }}" alt="foto perfil" width="60px" height="60px"></td>
                    <td>{{$registro->name}}</td>
                    <td>{{$registro->lastname}}</td>
                    <td>{{$registro->birthdate}}</td>
                    <td>{{$registro->email}}</td>
                    <td>
                        <button type="submit" class="btn btn-danger" onclick="confirmDelete('{{ $registro->id }}')"><i class="fa-solid fa-trash"></i> Eliminar</button>
                    </td>
                    <td>
                        <form action="{{route('personas.edit', $registro->id)}}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-color">Actualizar</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{route('UserPdf',$registro->id)}}" class="btn pdf" target="_blank">PDF</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-sm-12 custom-pagination">
                {{$registros->links()}}
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function confirmDelete(id) {
            alertify.confirm("¿Deseas eliminar este registro?", function(e) {
                if (e) {
                    let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/personas/' + id;
                    form.innerHTML = '@csrf @method("DELETE")';
                    document.body.appendChild(form);
                    form.submit();
                } else {
                    alertify.error('Cancelar');
                    return false;
                }
            });
        }
    </script>
</body>

</html>