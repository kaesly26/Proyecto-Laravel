@extends('layouts.principal')

@section('title', 'Crear Producto')

@section('content')

<div class="form-container">
    <form action="{{ route('guardarProducto') }}" method ="post" class="form-categoria">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nombre Producto</label><br>
            <input type="text" name="nombre" value="{{ old('nombre_producto') }}" required>
            @if ($errors->has('nombre_producto'))
            <div class="text-danger">{{ $errors->first('nombre_producto') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Precio</label><br>
            <input type="text" name="precio" value="{{ old('precio') }}" required>
            @if ($errors->has('precio'))
            <div class="text-danger">{{ $errors->first('precio') }}</div>
            @endif
        </div>
        <!-- <div class="mb-3">
            <label class="form-label">Cantidad</label><br>
            <input type="number" name="stock" value="{{ old('stock') }}" required>
            @if ($errors->has('stock'))
            <div class="text-danger">{{ $errors->first('stock') }}</div>
            @endif
        </div> -->
        <div class="mb-3">
            <label class="form-label">Descripción</label><br>
            <textarea name="descripcion" rows="4" cols="20" required>{{ old('descripcion') }}</textarea>
            @if ($errors->has('descripcion'))
            <div class="text-danger">{{ $errors->first('descripcion') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="id_categoria">Categoría:</label>
            <select name="id_categoria" required>
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id_categoria }}" {{ old('id_categoria') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre_categoria }}</option>
                @endforeach
            </select>

            @if ($errors->has('id_categoria'))
            <div class="text-danger">{{ $errors->first('id_categoria') }}</div>
            @endif
        </div>
        <button type="submit">Guardar</button>
    </form>
    <br>
</div>

@endsection