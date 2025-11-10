@extends('template')

@section('body-class', 'fondo-home')
@section('content')
  <main class="container text-center">

    <div class="row mt-5">
      <div class="col">
        <img src="images/Draftosaurus/Draftosaurus - Normal.png" class="img-fluid w-50" id="Draftosaurus" title="Logo - Draftosaurus">
      </div>
    </div>

    <br>
    <br>

    <div class="row">
      <div class="col">
        <div class="cajaHome"> 
          <h2 class="tituloHome">¿Qué es Draftosaurus?</h2>
          <p class="parrafoHome">
            Draftosaurus es un juego de mesa que se puede jugar entre 2 a 5 jugadores.
            Es un juego de estrategia en el que los jugadores deben construir de un parque
            de dinosaurios, donde tienen que organizar a los dinosaurios en distintas áreas del parque para
            conseguir la mayor cantidad de puntos.
          </p>
          <p class="parrafoHome">
            Cada jugador tiene un tablero con la imagen de su parque, el cual está 
            dividido en zonas con distintos puntos, cada uno con reglas para colocar a dichos dinosaurios.
          </p>
        </div>
      </div>

      <div class="col"> 
        <div class="cajaHome">
          <h2 class="tituloHome">¿Cómo se juega?</h2>
          <p class="parrafoHome">
            En cada ronda, los jugadores toman 6 dinosaurios al azar de una bolsa. 
            Al inicio de la ronda, uno de los jugadores tira un dado para establecer una restricción 
            de colocación para los demás jugadores. Luego eligen uno de sus dinosaurios para colocar 
            en el parque respetando la cara del dado (menos el que lanza el dado).
          </p>
          <p class="parrafoHome">
            El juego se juega en dos fases (verano e invierno), con un número fijo 
            de rondas por fase. Al final, se cuentan los puntos de cada zona del parque y quien tenga 
            el total más alto gana.
          </p>
        </div> 
      </div>
    </div>

    <div class="row" id="section">
      <div class="col">
        <div class="cajaHome">
          <br>
          <img src="images/Draftosaurus/Draftosaurus - Futurista.png" class="img-fluid w-50" id="Draftosaurus" title="Logo Futurista - Draftosaurus">
          <h2 class="tituloHomeFuturista">Nuestra Versión</h2>
          <p class="parrafoHomeFuturista">
            Draftosaurus: Edición Futurista es una adaptación del clásico juego de mesa, 
            ambientada en un futuro donde la humanidad ha colonizado planetas y perfeccionado la clonación genética. 
            De 2 a 5 jugadores compiten por construir el parque de dinosaurios más avanzado del sistema solar, 
            ubicado en estaciones orbitales o bases interplanetarias.
          </p>
          <p class="parrafoHomeFuturista">
            La esencia del juego sigue intacta: selección estratégica de dinosaurios, 
            colocación táctica y adaptación a restricciones. Pero ahora, el desafío incluye pensar en crear un parque 
            con dinosaurios cibernéticos.
          </p>
          <br>
          <a href="{{ url('/info') }}" id="textoInfoFinal">Más Información</a>
        </div>
      </div>
    </div>

    <div class="row" id="section">
      <div class="col">
        <a href="{{ url('/play') }}" id="textoJugarFinal">Jugar Ahora</a>
      </div>
    </div>

  </main>
@endsection
