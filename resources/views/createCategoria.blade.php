@extends('layouts.principal')

@section('title', 'crear categoria')

@section('content')

<div class="form-conteiner">
    <form action="" method="post" class="form-categoria">
        <div class="mb-3">
            <label class="form-label">Nombre</label><br>
            <input type="text" name="nombre">
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción</label><br>
            <textarea name="descripcion" rows="4" cols="20"></textarea>
        </div>
        <button type="submit">Guardar</button>

    </form>
    <p>
        <<<<<a href="{{asset('/')}}">atras</a>
    </p>
</div>

@endsection