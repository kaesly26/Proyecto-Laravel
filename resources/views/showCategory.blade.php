@extends('layouts.principal')

@section('title', 'categorias')

@section('content')

<div class="form-container">
    <div class="form-categoria">
        <form action="{{ route('categoria.create')}}" method="get">
            @csrf
            <button type="submit">Crear Categoria</button>
        </form>
        <table class="table table-bordered table-striped">
            <thead>
                <h4>Lista de categorias</h4>

                <tr>
                    <th>Id categoria</th>
                    <th>Nombre Categoria</th>
                    <th>Descripción</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categorias as $categoria)
                <tr>
                    <td>{{$categoria->id_categoria}}</td>
                    <td>{{$categoria->nombre_categoria}}</td>
                    <td>{{$categoria->descripcion_categoria}}</td>
                    <td>
                        <a href="{{route('categoria.edit', $categoria->id_categoria)}}">Editar</a>
                    </td>
                    <td>
                        <button type="submit" onclick="confirmDelete('{{ $categoria->id_categoria}}')">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
<script>
    function confirmDelete(id) {
        alertify.confirm(" ¿Deseas eliminar este registro?", function(e) {
            if (e) {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = '/categoria/' + id;
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