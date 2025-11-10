@extends('template')

@section('body-class', 'fondo-play')
@section('content')
<div class="container py-5 text-light">
          <div class="col">
        <img src="{{ asset('images/Draftosaurus/Draftosaurus - Doble.png') }}" class="img-fluid w-50" id="DraftosaurusDoble" title="Logo - Draftosaurus">
      </div>
    <h2 class="mb-4">Partidas de Draftosaurus</h2>

    <a href="{{ route('partidas.create') }}" class="btn btn-primary mb-3">Crear nueva partida</a>
    <table class="table table-bordered table-dark text-light">
        <thead>
             @if($partidas->isEmpty())
        <div class="alert alert-info">
            No hay partidas registradas.
        </div>
    @else
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Jugadores</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($partidas as $partida)
                <tr>
                    <td>{{ $partida->id }}</td>
                    <td>{{ $partida->nombre }}</td>
                    <td>{{ $partida->estado }}</td>
                    <td>{{ $partida->jugadores->count() }}</td>

                    <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('partidas.show', $partida) }}">Ver</a>
                    @auth
                    @if(Auth::user()->role === 'admin')
                    <form action="{{ route('partidas.destroy', $partida->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"> Eliminar </button>
                            </form>
                    @endif
                    @endauth
                    </td>
                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection
