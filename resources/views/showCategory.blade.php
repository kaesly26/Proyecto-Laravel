@extends('layouts.principal')

@section('title', 'categorias')

@section('content')

<div class="form-container">
    <div class="form-categoria">
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
                        <a href="">Editar</a>
                    </td>
                    <td>
                        <button>Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('categoria')}}">crear categoria</a>
    </div>
</div>

@endsection