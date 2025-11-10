@extends('template_login_register')

@section('title', 'Iniciar Sesión')
@section('header', 'Iniciar Sesión')

@section('content')

    <div class="form-group">
      <label for="email">Correo electrónico</label>
      <input type="email" id="email" name="email" class="form-control" required />
    </div>

    <div class="form-group">
      <label for="password">Contraseña</label>
      <input type="password" id="password" name="password" class="form-control" required />
    </div>

    <div class="form-group mt-3">
      <button type="submit" class="btn btn-primary w-100">Ingresar</button>
    </div>
  </form>

  <p class="mt-3 text-center">
    ¿No tienes cuenta? <a href="{{ url('/register') }}">Regístrate aquí</a>
  </p>
@endsection
