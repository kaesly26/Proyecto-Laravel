@extends('layouts.principal')

@section('title', isset($update) ? 'Editar categoria' : 'Crear categoria')

@section('content')

<div class="form-container">
    <div class="form-categoria">
        <form action="{{ isset($update) ? route('categoria.update', $update->id_categoria) : route('categoria.store') }}" method="POST">
            @csrf
            @if (isset($update))
            @method('PUT')
            @endif
            <div class="mb-3">
                <label class="form-label">Nombre Categoria</label><br>
                <input type="text" name="nombre_categoria" value="{{ old('nombre_categoria', isset($update) ? $update->nombre_categoria : '') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label><br>
                <textarea name="descripcion_categoria" rows="4" cols="20" required>{{ old('descripcion_categoria', isset($update) ? $update->descripcion_categoria : '') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($update) ? 'Actualizar' : 'Guardar' }}</button>
        </form>
    </div>
</div>

@endsection