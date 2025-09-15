@extends('template')

@section('body-class', 'fondo-project')
@section('content')
  <main class="container">

    <div class="row">

      <div class="col">
        <div class="cajaProject"> 
          <h2 class="tituloMyV">Introducción</h2>
          <p class="parrafoMyV">
            El proyecto consiste en desarrollar un software para el seguimiento de las partidas del juego de mesa "Draftosaurus". 
            La idea que se llevará a cabo es que a partir de la base del juego de mesa: habrá que crear tableros, un dado y personajes, 
            con la misma dinámica que el juego de mesa sin modificar las reglas principales. Luego de desarrollar la aplicación, 
            los jugadores la utilizarán para llevar un registro de las partidas, como la colocación de personajes en sus tableros 
            y calcular la puntuación final para determinar al ganador.
          </p>
        </div>
      </div>

      <div class="col"> 
        <div class="cajaProject">
          <h2 class="tituloProject">Objetivo General</h2>
          <p class="parrafoProject">
            Nuestro propósito es desarrollar un proyecto educativo innovador: un juego de mesa inclusivo y adaptable al entorno virtual, 
            diseñado para todos los públicos y orientado a fomentar el aprendizaje significativo mediante experiencias lúdicas.
            El objetivo general del proyecto es crear una solución informática que facilite la gestión, seguimiento y análisis de las partidas 
            del juego de mesa Draftosaurus, optimizando la experiencia del usuario y ofreciendo herramientas para la mejora estratégica del juego.
          </p>
        </div> 
      </div>

      <div class="cajaProject"> 
        <h2 class="tituloProject">Justificación del Proyecto</h2>
        <p class="parrafoProject">
          El presente proyecto, "S.I.G.P.D. - Sistema Informático de Gestión de Partidas para Draftosaurus", se justifica como una iniciativa 
          fundamental para los estudiantes que cursan 3ro del Bachillerato de Tecnologías de la Información - Universidad del Trabajo del Uruguay (UTU). 
          Se realiza en colaboración y conjunto con diversas asignaturas presentes de este año: Programación Full Stack, Administración de Sistemas Operativos, 
          Ingeniería del Software, Tutoría de Proyecto UTULAB, Emprendedurismo y Gestión, Física, Sociología, Inglés y Física.
        </p>
      </div>

    </div>

  </main>
@endsection
