@extends('layouts.principal')

@section('title', 'Producto')

@section('content')

<div class="form-container">
    <div class="form-categoria">
        <form action="{{ route('productos.create')}}" method="get">
            @csrf
            <button type="submit">Crear Producto</button>
        </form>
        <table class="table table-bordered table-striped">
            <thead>
                <h4>Lista de Productos</h4>

                <tr>
                    <th>Id Producto</th>
                    <th>Nombre Producto</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td>{{$producto->id_producto}}</td>
                    <td>{{$producto->nombre_producto}}</td>
                    <td>{{$producto->precio}}</td>
                    <td>{{$producto->descripcion}}</td>
                    <td>
                        <a href="">Editar</a>
                    </td>
                    <td>
                        <button type="submit" onclick="confirmDelete('{{ $producto->id_producto}}')">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
<script>
    function confirmDelete(id) {
        alertify.confirm("¿Deseas eliminar este registro?", function(e) {
            if (e) {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = '/productos/' + id;
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
@endsection