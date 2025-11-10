@extends('template')

@section('content')
<div class="container mt-4">

    <h1 class="mb-4">Mi Perfil</h1>

    <div class="card shadow-sm">
        <div class="card-body">

            <h4 class="card-title">{{ Auth::user()->name }}</h4>

            <p class="card-text">
                <strong>ID:</strong> {{ Auth::user()->id }} <br>
                <strong>Email:</strong> {{ Auth::user()->email }} <br>

                @if(Auth::user()->role)
                <strong>Rol:</strong> {{ Auth::user()->role }} <br>
                @endif

                <strong>Fecha de creación:</strong>
                {{ Auth::user()->created_at->format('d/m/Y H:i') }} <br>

                <strong>Última actualización:</strong>
                {{ Auth::user()->updated_at->format('d/m/Y H:i') }} <br>
            </p>

            <hr>

            <a href="{{ route('auth.logout') }}" class="btn btn-danger">
                Cerrar sesión
            </a>

        </div>
    </div>

</div>
@endsection
