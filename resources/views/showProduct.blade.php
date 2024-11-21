@extends('layouts.principal')

@section('title', 'Productos')

@section('content')

<div class="form-container">
    <div class="form-categoria">
        <form action="{{ route('productos.create') }}" method="get" class="mb-3">
            @csrf
            <button type="submit" class="btn" style="background: #4E31AA; color: #F5F7F8">Crear Producto</button>
        </form>

        <h4 class="mb-3">Lista de Productos</h4>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id Producto</th>
                    <th>Nombre Producto</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id_producto }}</td>
                    <td>{{ $producto->nombre_producto }}</td>
                    <td>${{ number_format($producto->precio, 2) }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td><a href="{{ route('productos.edit', $producto->id_producto) }}" class="btn btn-warning">Editar</a></td>
                    <td>
                        <button class="btn btn-danger" onclick="confirmDelete('{{ $producto->id_producto }}')">Eliminar</button>
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
                alertify.error('Cancelado');
            }
        });
    }
</script>

@endsection