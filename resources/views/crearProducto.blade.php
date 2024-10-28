@extends('layouts.principal')

@section('title', isset($update) ? 'Editar Producto' : 'Crear Producto')

@section('content')

<div class="form-container">
    <form action="{{ isset($update) ? route('productos.update', $update->id_producto) : route('productos.store') }}" method="POST" class="form-categoria">
        @csrf
        @if(isset($update))
        @method('PUT')
        @endif

        <div class="mb-3">
            <label class="form-label">Nombre Producto</label><br>
            <input type="text" name="nombre" value="{{ old('nombre', isset($update) ? $update->nombre_producto : '') }}" required>
            @if ($errors->has('nombre'))
            <div class="text-danger">{{ $errors->first('nombre') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Precio</label><br>
            <input type="number" step="0.01" name="precio" value="{{ old('precio', isset($update) ? $update->precio : '') }}" required>
            @if ($errors->has('precio'))
            <div class="text-danger">{{ $errors->first('precio') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label><br>
            <textarea name="descripcion" rows="4" cols="20" required>{{ old('descripcion', isset($update) ? $update->descripcion : '') }}</textarea>
            @if ($errors->has('descripcion'))
            <div class="text-danger">{{ $errors->first('descripcion') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="id_categoria">Categoría:</label>
            <select name="id_categoria" required>
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id_categoria }}" {{ old('id_categoria', isset($update) ? $update->id_categoria : '') == $categoria->id_categoria ? 'selected' : '' }}>
                    {{ $categoria->nombre_categoria }}
                </option>
                @endforeach
            </select>
            @if ($errors->has('id_categoria'))
            <div class="text-danger">{{ $errors->first('id_categoria') }}</div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($update) ? 'Actualizar' : 'Guardar' }}</button>
    </form>
    <br>
</div>

@endsection