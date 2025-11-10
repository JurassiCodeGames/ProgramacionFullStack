@extends('template')

@section('body-class', 'fondo-home')
@section('content')
<h1>hola</h1>

<h2>Jugadores:</h2>

<ul>
    <li>
        <form action="" method="POST">
            @csrf
            @method('DELETE')
            <button>Eliminar</button>
        </form>
    </li>

</ul>

    <h3>Agregar jugador</h3>
    <form action="" method="POST">
        @csrf
        <select name="">

                <option value=""></option>
 
        </select>
        <button>Añadir</button>
    </form>

@ensection
