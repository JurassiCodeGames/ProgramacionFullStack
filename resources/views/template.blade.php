<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
      @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" 
          crossorigin="anonymous">

    <title>@yield('title', 'Draftosaurus (2019)')</title>
  </head>

  <body class="@yield('body-class')">
    <header>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <img src="favicon.ico" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
          <a class="nav-link" href="{{ url('/play') }}" id="textoJugar">Jugar</a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" 
                  aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Inicio</a>
              <a class="nav-link" href="{{ url('/rules') }}">Reglas</a>
              <a class="nav-link" href="{{ url('/info') }}">Información</a>
              <a class="nav-link" href="{{ url('/project') }}">Este Proyecto</a>
              <a class="nav-link" href="{{ url('/myv') }}">Misión y Visión</a>
              <a class="nav-link" href="{{ url('/us') }}" id="textoNosotros">Nosotros</a>
            </div>

            <div class="navbar-nav ms-auto">
              <a class="btn btn-primary m-2" href="{{ url('/login') }}">Iniciar Sesión</a>
              <a class="btn btn-secondary m-2" href="{{ url('/register') }}">Registrarse</a>
            </div>
          </div>
        </div>
      </nav>
    </header>

    <main class="template-content">
      @yield('content')
    </main>

    <footer>
      <small>© 2025 Jurassicode Games — Todos los derechos reservados.</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" 
            crossorigin="anonymous">
    </script>
  </body>
</html>
