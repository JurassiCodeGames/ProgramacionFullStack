@extends('template')

@section('body-class', 'fondo-info')
@section('content')
  <br>
  <br>
  <main class="container text-center">

    <div class="row">
      <div class="col">
        <img src="images/Draftosaurus/Draftosaurus - Futurista.png" class="img-fluid w-50" id="Draftosaurus" title="Logo Futurista - Draftosaurus">
      </div>
    </div>

    <br>
    <br>

    <div class="row" id="section">
      <div class="col">
        <div class="cajaInfo">
          <h2 class="tituloInfo">Nuestra Versión</h2>
          <p class="parrafoInfo">
            Draftosaurus: Edición Futurista es una adaptación del clásico juego de mesa, 
            ambientada en un futuro donde la humanidad ha colonizado planetas y perfeccionado la clonación genética. 
            De 2 a 5 jugadores compiten por construir el parque de dinosaurios más avanzado del sistema solar, 
            ubicado en estaciones orbitales o bases interplanetarias.
          </p>
          <p class="parrafoInfo">
            La esencia del juego sigue intacta: selección estratégica de dinosaurios, 
            colocación táctica y adaptación a restricciones. Pero ahora, el desafío incluye pensar en crear un parque 
            con dinosaurios cibernéticos.
          </p>
          <br>
        </div>
      </div>
    </div>

    <div class="row" id="section">
      <div class="col">
        <div class="cajaInfo"> 
          <h2 class="tituloMasInfo">Historia: Siglo XL, Año 4000</h2>
          <p class="parrafoMasInfo">
            Después de mil años de exploración espacial, la humanidad ha colonizado 
            más de 200 sistemas estelares. La Tierra sigue existiendo, pero es ahora un santuario histórico, 
            protegido por tratados interplanetarios. La vida humana se ha adaptado a entornos extremos: 
            atmósferas de titanio, lunas heladas, estaciones orbitales con gravedad artificial.
          </p>
          <p class="parrafoMasInfo">
            En este nuevo milenio, la biotecnología ha alcanzado su cúspide. 
            Gracias al descubrimiento del ADN fósil universal, los científicos lograron clonar especies 
            extintas de cualquier planeta, incluyendo los dinosaurios terrestres. Pero no se conformaron
            con replicarlos: los rediseñaron para sobrevivir en entornos alienígenas, fusionando genética 
            con nanotecnología. Así nacieron los DinoNexos, criaturas híbridas con capacidades adaptativas, 
            sensores integrados y comportamiento programable.
          </p>
        </div>
      </div>

      <div class="col"> 
        <div class="cajaInfo">
          <h2 class="tituloMasInfo">Dado, Tablero y Dinosaurios</h2>
          <p class="parrafoMasInfo">
            El dado se activa al inicio de cada partida mediante pulsos gravitacionales. 
            Cada cara representa una fluctuación en el ecosistema espacial del parque, provocada por interferencias solares, 
            protocolos corporativos o anomalías genéticas.
          </p>
          <p class="parrafoMasInfo">
            Cada jugador con su tablero controla una base espacial construida sobre asteroides terraformados. 
            El tablero es reversible y expandible, con sectores conectables que simulan hábitats artificiales y laboratorios orbitales.
          </p>
          <p class="parrafoMasInfo">
            Cada Dinosaurio es una criatura bioimpresa en laboratorios orbitales, con adaptaciones específicas 
            para sobrevivir en entornos extremos. Se representan con modelos 3D estilizados y actualmente nos estamos concentrando
            en desarrollar nueva tecnología para su adaptación. Modificamos sus ADN, no partes externas.
          </p>
        </div> 
      </div>
    </div>

  </main>
@endsection
