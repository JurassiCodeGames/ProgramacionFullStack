@extends('template')

@section('content')
<header class="container card p-3 mt-3 shadow-sm">
    <div class="row text-center fw-bold g-2">
        <div class="col">Ronda: <span id="ronda-display">1</span></div>
        
        @foreach($partida->jugadores as $index => $jugador)
            <div class="col">
                {{ $jugador->name }}: <span id="score-j{{ $index + 1 }}">0</span>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-3">
        <button id="roll-die-btn" class="btn btn-danger px-4">Lanzar Dado</button>
        <div id="die-result" class="mt-2 fw-bold"></div>
    </div>

    <h1 id="current-selection" class="text-center mt-3"></h1>
</header>

<main class="container mt-4" id="game-container"></main>

<div id="end-screen" class="d-flex flex-column align-items-center justify-content-center vh-100">
    <h1 class="text-center border-bottom pb-2">Resultados Finales</h1>

    <div id="final-scores" class="card p-3 mt-3 w-100" style="max-width: 400px;"></div>

    <form action="{{ route('partidas.finalizar', $partida) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-success">Finalizar Partida</button>
    </form>

    <a href="{{ route('partidas.index') }}" id="restart-btn" class="btn btn-secondary mt-3">Volver al Inicio</a>
</div>

<script>
    const partidaId = {{ $partida->id }};
    const playerIds = [
        @foreach($partida->jugadores as $jugador)
            {{ $jugador->id }},
        @endforeach
    ];

    const playerNames = {
        @foreach($partida->jugadores as $jugador)
            {{ $jugador->id }}: "{{ $jugador->name }}",
        @endforeach
    };
</script>

@endsection
