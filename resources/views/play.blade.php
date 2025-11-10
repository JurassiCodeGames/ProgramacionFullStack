@extends('template')

@section('body-class', 'fondo-play')

@section('content')
<div class="container text-center py-5">

  <!-- ENCABEZADO -->

      <div class="col">
        <img src="images/Draftosaurus/Draftosaurus - Doble.png" class="img-fluid w-50" id="DraftosaurusDoble" title="Logo - Draftosaurus">
      </div>
  <div class="text-center mb-5">
    <h1 class="fw-bold text-light">Crear Partida</h1>
    <p class="text-light">El juego está por empezar. ¡Agregá jugadores, ahora!</p>
  </div>

  <!-- BLOQUES CENTRALES -->
  <div class="row justify-content-center">

    <!-- TARJETA: AGREGAR JUGADOR -->
    <div class="col-md-5">
      <div class="card bg-dark text-light border-0 shadow-lg p-4 rounded-4">
        <h3 class="mb-3">Credenciales de la Partida</h3>
        <form>
          <div class="mb-3">
            <label class="form-label">Nombre o ID del jugador</label>
            <input type="text" class="form-control" required/>
          </div>
          <div class="mb-3">
            <label class="form-label">Nombre de la partida</label>
            <input type="text" class="form-control" required/>
          </div>
          <div class="d-grid">
            <button class="btn btn-primary">Agregar Jugador</button>
          </div>
        </form>
      </div>
    </div>

    <!-- TARJETA: JUGADORES -->
    <div class="col-md-5">
      <div class="card bg-dark text-light border-0 shadow-lg p-4 rounded-4">
        <h3 class="mb-3">Jugadores en la partida</h3>
        <p>Aún no hay jugadores agregados.</p>
      </div>
    </div>

  </div>

  <!-- ACCIONES -->
  <div class="card bg-dark text-light border-0 shadow p-4 mt-5 text-center rounded-4">
    <div class="row justify-content-center">
      <div class="col-md-8 d-flex flex-wrap gap-3 justify-content-center">
        <button class="btn btn-success"> Iniciar Partida </button>
        <button class="btn btn-danger"> Vaciar Lista </button>
      </div>
    </div>
  </div>

</div>
@endsection
