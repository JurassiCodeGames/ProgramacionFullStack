<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Partida;
use Illuminate\Http\Request;

class PartidaController extends Controller
{
    public function partidas()
    {
        // Trae todas las partidas con sus jugadores (para evitar N+1)
        $partidas = Partida::with('jugadores')->get();

        return view('partidas.index', compact('partidas'));
    }

    public function create()
    {
        $players = User::where('role', 'player')->get();
        return view('partidas.create', compact('players'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_partida' => 'required|string|max:255',
            'user_ids' => 'required|array|min:1|max:5',
            'user_ids.*' => 'exists:users,id',
        ]);

        // Crear la partida
        $partida = Partida::create([
            'nombre' => $request->nombre_partida,
        ]);

        // Adjuntar usuarios a la partida (pivot)
        $partida->jugadores()->attach($request->user_ids);

        return redirect()->route('partidas.show', $partida->id)
                         ->with('success', 'Partida creada correctamente');
    }

    public function show($id)
    {
        $partida = Partida::with('jugadores')->findOrFail($id);
        return view('partidas.show', compact('partida'));
    }

    public function vaciar($id)
    {
        $partida = Partida::findOrFail($id);
        $partida->jugadores()->detach();

        return back()->with('success', 'Se vació la lista de jugadores.');
    }

    public function iniciar($id)
    {
        $partida = Partida::findOrFail($id);

        $partida->update([
            'fecha_inicio' => now()
        ]);

        return redirect()->route('game')->with('success', 'Partida iniciada.');
    }

    public function destroy(Partida $partida)
    {
        $partida->delete();

        return redirect()->route('partidas.index')
                         ->with('success', 'Partida eliminada correctamente.');
    }

    public function finalizar(Partida $partida)
    {
        $partida->estado = 'Finalizado';
        $partida->fecha_fin = now();
        $partida->save();

        return redirect()->route('partidas.index')->with('success', 'Partida finalizada.');
    }
}
