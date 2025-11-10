@extends('template_login_register')

@section('title', 'Registrarse')
@section('header', 'Registrar Cuenta')
@section('content')
<form action="{{ route('auth.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Nombre</label>
      <input type="text" id="name" name="name" class="form-control" required/>
    </div>

    <div class="form-group">
      <label for="email">Correo electrónico</label>
      <input type="email" id="email" name="email" class="form-control" required/>
    </div>

    <div class="form-group">
      <label for="password">Contraseña</label>
      <input type="password" id="password" name="password" class="form-control" required/>
    </div>

    <div class="form-group">
      <label for="password_confirmation">Confirmar Contraseña</label>
      <input type="password" id="password_confirmation" name="password_confirmation" required/>
    </div>

    <div class="form-group mt-3">
      <button type="submit" class="btn btn-success w-100">Registrarse</button>
    </div>
  </form>

  <p class="mt-3 text-center">
    ¿Ya tienes cuenta? <a href="{{ url('/login') }}">Inicia sesión aquí</a>
  </p>

@endsection