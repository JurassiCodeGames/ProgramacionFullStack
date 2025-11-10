@extends('template')

@section('content')
<div class="container mt-4">

    <h1 class="mb-4">Información del Usuario</h1>

    <div class="card shadow-sm">
        <div class="card-body">

            <h4 class="card-title">{{ $user->name }}</h4>

            <p class="card-text">
                <strong>ID:</strong> {{ $user->id }} <br>
                <strong>Email:</strong> {{ $user->email }} <br>
                <strong>Rol:</strong> {{ $user->role }} <br>
                <strong>Fecha de creación:</strong> {{ $user->created_at->format('d/m/Y H:i') }} <br>
                <strong>Última actualización:</strong> {{ $user->updated_at->format('d/m/Y H:i') }} <br>
            </p>

            <hr>

            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                Volver a la lista
            </a>

            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">
                Editar usuario
            </a>

            <form action="{{ route('users.destroy', $user->id) }}"
                  method="POST"
                  class="d-inline"
                  onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Eliminar</button>
            </form>

        </div>
    </div>

</div>
@endsection
