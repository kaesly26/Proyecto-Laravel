@extends('layouts.welcome')

@section('title', 'Iniciar Sesión')

@section('content')

<div class="div">
    <form action="{{route('login')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Email</label><br>
            <input type="text" name="email" required><br>
        </div>
        <div class="mb-3">
            <label class="form-label">Contraseña</label><br>
            <input type="password" name="password" required>
        </div><br>
        @if ($errors->has('email'))
        <span>{{ $errors->first('email') }}</span>
        @endif
        @if ($errors->has('password'))
        <span>{{ $errors->first('password') }}</span>
        @endif
        <button type="submit" class="btn btn-color">Ingresar</button><br>
        <p class="message">¿No registrado? <a href="{{route('show.register')}}">Registrarse</a></p>
    </form>
</div>

@endsection