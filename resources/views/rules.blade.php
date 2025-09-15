@extends('template')

@section('body-class', 'fondo-rules')
@section('content')
  <main class="container">

    <div class="CajaRules">
      <h2 class="tituloRules">Objetivo del Juego</h2>
      <p class="parrafoRules">
        Construir un parque de dinosaurios y colocarlos estratégicamente en los distintos recintos para obtener la mayor cantidad de puntos al final de la partida.
      </p>
    </div>

    <div class="CajaRules">
      <h2 class="tituloRules">Cómo se Juega</h2>
      <p class="parrafoRules">
        El juego se desarrolla en dos rondas, y cada ronda tiene seis turnos.
      </p>
    </div>

    <div class="CajaRules">
      <h2 class="tituloRules">Preparación del Juego en modo base</h2>
      <p class="parrafoRules">1. Cada jugador toma un tablero del parque y lo coloca frente a sí.</p>
      <p class="parrafoRules">2. Todos los dinosaurios se meten en la bolsa y se mezclan bien.</p>
      <p class="parrafoRules">3. Decidan quién será el primer jugador (puede ser al azar).</p>
    </div>

    <div class="CajaRules">
      <h2 class="tituloRules">Desarrollo del Juego</h2>
      <p class="parrafoRules">El juego se desarrolla en dos rondas, cada una con 6 turnos.</p>
    </div>

    <div class="CajaRules">
      <h2 class="tituloRules">Los turnos de los jugadores</h2>
      <ul class="parrafoRules">
        <li>
          <i>1. Toma de Dinosaurios</i>
          <ul>
            <li>Cada jugador toma 6 dinosaurios al azar de la bolsa.</li>
            <li>Los mantiene en su mano sin mostrarlos a los demás.</li>
          </ul>
        </li>
        <li>
          <i><br>2. Lanzamiento del Dado</i>
          <ul>
            <li>El jugador activo lanza el dado de colocación.</li>
            <li>El dado impone una restricción para el resto de jugadores en la colocación del próximo dinosaurio (el jugador activo no aplica esta restricción).</li>
          </ul>
        </li>
        <li>
          <i><br>3. Elección y Colocación de un Dinosaurio</i>
          <ul>
            <li>Todos los jugadores eligen 1 dinosaurio de su mano y lo colocan en su parque, respetando las reglas de colocación y la restricción del dado si corresponde.</li>
          </ul>
        </li>
        <li>
          <i><br>4. Paso de dinosaurios restantes y cambio de jugador activo</i>
          <ul>
            <li>Cada jugador pasa los dinosaurios restantes de su mano al jugador de su izquierda.</li>
            <li>Se pasa el dado en sentido horario al nuevo jugador activo.</li>
            <li>Se repite el proceso desde el paso 2 hasta que se hayan colocado 6 dinosaurios.</li>
          </ul>
        </li>
        <li>
          <i><br>5. Fin de la Primera Ronda</i>
          <ul>
            <li>Se repiten los mismos pasos sacando 6 dinosaurios nuevos de la bolsa para una segunda ronda.</li>
          </ul>
        </li>
      </ul>
    </div>

    <div class="CajaRules">
      <h2 class="tituloRules">Restricciones del Dado de Colocación</h2>
      <p class="parrafoRules">
        El dado determina en qué zona del parque se debe colocar un dinosaurio en ese turno (no aplica para el jugador que lo lanza).
      </p>
      <ul class="parrafoRules">
        <li>Zona izquierda o derecha del parque.</li>
        <li>Zona boscosa o de rocas.</li>
        <li>Recinto vacío.</li>
        <li>Recinto que no contenga un T-Rex.</li>
        <li>Si un jugador no puede colocar un dinosaurio en un recinto válido, debe colocarlo en el río.</li>
      </ul>
    </div>

    <div class="CajaRules">
      <h2 class="tituloRules">Reglas de los Recintos y Puntuación</h2>
      <p class="parrafoRules">
        Cada recinto tiene sus propias reglas de colocación y puntúa de forma diferente al final del juego:
      </p>
      <ul class="parrafoRules">
        <li>
          <i>1. El Bosque de la Semejanza</i>
          <ul>
            <li>Este recinto sólo puede albergar dinosaurios de la misma especie.</li>
            <li>Debe ocuparse siempre de izquierda a derecha sin dejar espacios intermedios.</li>
            <li>Al final de la partida, ganarás los puntos de victoria indicados según el número total de dinosaurios colocados en el recinto.</li>
          </ul>
        </li>
        <li>
          <i><br>2. El Prado de la Diferencia</i>
          <ul>
            <li>Este recinto sólo puede albergar dinosaurios de especies distintas.</li>
            <li>Debe ocuparse siempre de izquierda a derecha sin dejar espacio intermedios.</li>
            <li>Al final de la partida, ganarás los puntos de victoria indicados según el número de dinosaurios colocados en el recinto.</li>
          </ul>
        </li>
        <li>
          <i><br>3. La Pradera del Amor</i>
          <ul>
            <li>Este recinto puede albergar dinosaurios de todas las especies.</li>
            <li>Al final de la partida, conseguirás 5 puntos de victoria por cada pareja de dinosaurios de la misma especie que se encuentre en el recinto.</li>
            <li>Está permitido tener más de una pareja de la misma especie.</li>
            <li>Los dinosaurios que no formen pareja no suman puntos.</li>
          </ul>
        </li>
        <li>
          <i><br>4. El Trío Frondoso</i>
          <ul>
            <li>Este recinto puede albergar hasta 3 dinosaurios sin importar su especie.</li>
            <li>Al final de la partida, ganarás 7 puntos de victoria si hay exactamente 3 dinosaurios dentro del recinto.</li>
            <li>Si al final de la partida el recinto no alberga exactamente 3 dinosaurios, no te llevas ningún punto.</li>
          </ul>
        </li>
        <li>
          <i><br>5. El Rey de la Selva</i>
          <ul>
            <li>Este recinto puede albergar solo 1 dinosaurio.</li>
            <li>Al final de la partida ganarás 7 puntos de victoria si ningún jugador o jugadora tiene en su parque más dinosaurios que tú de esta especie.</li>
            <li>En caso de empate recibes igualmente los 7 puntos.</li>
          </ul>
        </li>
        <li>
          <i><br>6. La Isla Solitaria</i>
          <ul>
            <li>Este recinto puede albergar solo 1 dinosaurio.</li>
            <li>Al final de la partida otorga 7 puntos de victoria si es el único de su especie en tu parque.</li>
            <li>En caso contrario otorga 0 puntos.</li>
          </ul>
        </li>
      </ul>
    </div>

    <div class="CajaRules">
      <h2 class="tituloRules">Fin del Juego y Puntuación Final</h2>
      <p class="parrafoRules">
        Después de la segunda ronda (cuando cada jugador ha colocado 12 dinosaurios en su parque), se suman los puntos y se determina el ganador.
      </p>
      <ul class="parrafoRules">
        <li>Se suman los puntajes de cada recinto.</li>
        <li>Cada dinosaurio en el río suma 1 punto.</li>
        <li>Cada recinto con al menos 1 T-Rex otorga 1 punto extra.</li>
      </ul>
      <p class="parrafoRules">El jugador con más puntos es el ganador.</p>
      <p class="parrafoRules">En caso de empate, el que tenga más dinosaurios en su parque gana.</p>
    </div>

    <div class="CajaRules">
      <h2 class="tituloRules">Resumen Rápido</h2>
      <ul class="parrafoRules">
        <li>Tomar 6 dinosaurios al azar.</li>
        <li>Lanzar el dado y aplicar la restricción.</li>
        <li>Elegir y colocar un dinosaurio.</li>
        <li>Pasar los dinosaurios restantes.</li>
        <li>Repetir hasta colocar 6 dinosaurios (fin de la ronda).</li>
      </ul>
    </div>

  </main>
@endsection
