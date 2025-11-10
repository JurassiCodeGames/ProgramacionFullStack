<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    protected $fillable = ['nombre',
    'fecha_inicio',
    'fecha_fin',
    'duracion',
    'ganador_id'];

public function jugadores()
{
    return $this->belongsToMany(User::class);
}
}
