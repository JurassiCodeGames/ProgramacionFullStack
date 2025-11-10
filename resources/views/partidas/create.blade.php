@extends('template')

@section('body-class', 'fondo-play')

@section('content')
<div class="container text-center py-5 text-light">

  <!-- ENCABEZADO -->
  <div class="col">
    <img src="{{ asset('images/Draftosaurus/Draftosaurus - Doble.png') }}" class="img-fluid w-50" id="DraftosaurusDoble" title="Logo - Draftosaurus">
  </div>
  <div class="text-center mb-5">
    <h1 class="fw-bold text-light">Crear Partida</h1>
    <p class="text-light">El juego está por empezar. ¡Agregá jugadores, ahora!</p>
  </div>

  <!-- FORMULARIO -->
  <form action="{{ route('partidas.store') }}" method="POST">
    @csrf

    <!-- 🧩 TARJETA: Datos de la Partida -->
    <div class="row justify-content-center mb-4">
      <div class="col-md-6">
        <div class="card bg-dark text-light border-0 shadow-lg p-4 rounded-4">
          <h3 class="mb-3">Datos de la Partida</h3>
          <div class="mb-3 text-start">
            <label class="form-label">Nombre de la partida</label>
            <input type="text" name="nombre_partida" class="form-control" required>
          </div>
        </div>
      </div>
    </div>

    <!-- 🧩 TARJETA: Agregar Jugadores -->
    <div class="row justify-content-center mb-4">
      <div class="col-md-6">
        <div class="card bg-dark text-light border-0 shadow-lg p-4 rounded-4">
          <label class="form-label text-start">Seleccionar Jugadores</label>
          <div class="list-group text-start">
            @foreach ($players as $player)
              <label class="list-group-item bg-dark text-light border-secondary rounded-3 mb-2">
                <input 
                  class="form-check-input me-2" 
                  type="checkbox" 
                  name="user_ids[]" 
                  value="{{ $player->id }}"
                >
                {{ $player->name }} 
                <span class="text-muted">({{ $player->email }})</span>
              </label>
            @endforeach
          </div>
          <small class="text-warning mt-1 d-block text-start">
            Selecciona hasta 5 jugadores.
          </small>
        </div>
      </div>
    </div>

    <!-- 🎮 BOTONES DE ACCIÓN -->
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card bg-dark text-light border-0 shadow p-4 text-center rounded-4">
          <div class="d-flex flex-wrap gap-3 justify-content-center">
            <button class="btn btn-success">Iniciar Partida</button>
            <button type="reset" class="btn btn-danger">Vaciar Lista</button>
            <a class="btn btn-secondary" href="{{ route('partidas.index') }}">Volver</a>
          </div>
        </div>
      </div>
    </div>

  </form>

</div>
@endsection
