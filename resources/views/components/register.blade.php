@extends('layouts.welcome')

@section('title', 'Registrarse')

@section('content')
<center>
    <div class="div">
        <form action="{{route('validar.register')}}" method="POST">
            @csrf
            <legend>REGISTRO</legend>
            <div class="mb-3">
                <label class="form-label">Usuario</label><br>
                <input type="text" name="name_user" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label><br>
                <input type="text" name="email" required><br>
                @if ($errors->has('email'))
                <span>{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label><br>
                <input type="password" name="password" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirmar Contraseña</label><br>
                <input type="password" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-color">registrarse</button><br>
            <p class="message">¿Ya tienes cuenta?<a href="{{route('admin.show.login')}}">iniciar sesion</a>
        </form>
    </div>
</center>
@endsection