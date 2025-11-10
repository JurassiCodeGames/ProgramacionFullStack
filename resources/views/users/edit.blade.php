@extends('template_login_register')

@section('title', 'Editar Usuario')
@section('header', 'Editar Cuenta')

@section('content')
<form action="{{ route('users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $user->name) }}" required/>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email', $user->email) }}" required/>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="role">Rol del Usuario</label>
        <select id="role" name="role" class="form-control" required>
        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
            Administrador
        </option>
        <option value="player" {{ old('role', $user->role) == 'player' ? 'selected' : '' }}>
            Usuario
        </option>
        </select>
    </div>

    <div class="form-group">
        <label for="password">Nueva Contraseña</label>
        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"/>
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <small class="text-muted">Déjalo en blanco para mantener la contraseña actual.</small>
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"/>
    </div>

    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary w-100">Guardar</button>
    </div>
</form>

  <p class="mt-3 text-center">
    ¿Prefieres cancelar? <a href="{{ route('users.index') }}">Volver atrás</a>
  </p>

@endsection
