@extends('layouts.principal')

@section('title', 'crear categoria')

@section('content')

<div class="form-container">
    <div class="form-categoria">
        <form action="{{ route('categoria.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nombre Categoria</label><br>
                <input type="text" name="nombre_categoria" value="{{ old('nombre_categoria') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label><br>
                <textarea name="descripcion_categoria" value="{{ old( 'descripcion_categoria' ) }}" rows="4" cols="20" required></textarea>
            </div>
            <button type="submit">Guardar</button>
        </form>
    </div>
</div>

@endsection