@extends('template')

@section('body-class', 'fondo-myv')
@section('content')
  <main class="container">

    <div class="row">

      <div class="col">
        <div class="cajaMyV"> 
          <h2 class="tituloMyV">Misión</h2>
          <p class="parrafoMyV">
            Desarrollar videojuegos innovadores con temática de dinosaurios que despierten la imaginación, 
            fomenten la curiosidad y brinden experiencias entretenidas para todas las edades. 
            Promover además el aprendizaje y la exploración a través de mundos interactivos.
          </p>
        </div>
      </div>

      <div class="col"> 
        <div class="cajaMyV">
          <h2 class="tituloMyV">Visión</h2>
          <p class="parrafoMyV">
            Ser reconocidos como la referencia regional en el desarrollo de videojuegos temáticos,
            destacándonos por nuestra capacidad de innovación, la originalidad de nuestros
            diseños y el compromiso con la alta calidad y diversión.
          </p>
        </div> 
      </div>

      <div class="cajaMyV">
        <h2 class="tituloMyV">Valores</h2>
        <div class="valores-grid">

          <div class="valor-item">
            <h3>Creatividad</h3>
            <p>Queremos ser creativos para atraer más público, no ser solo un juego de caja más.</p>
          </div>

          <div class="valor-item">
            <h3>Innovación</h3>
            <p>Buscamos algo nuevo, avanzar con la tecnología.</p>
          </div>

          <div class="valor-item">
            <h3>Calidad</h3>
            <p>Queremos que sea bueno, para generar confianza.</p>
          </div>

          <div class="valor-item">
            <h3>Aprendizaje</h3>
            <p>Siempre debe dejarte algo.</p>
          </div>

          <div class="valor-item">
            <h3>Diversión</h3>
            <p>Como todo juego, buscamos la diversión de todos.</p>
          </div>

          <div class="valor-item">
            <h3>Colaboración</h3>
            <p>Juntarnos para crear algo nuevo y útil a la sociedad.</p>
          </div>

        </div>
      </div>

    </div>

  </main>
@endsection
