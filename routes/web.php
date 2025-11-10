<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PartidaController;

Route::resource('users', UserController::class)->middleware('auth');

Route::controller(pageController::class)->group(function () {
    route::get('/', 'home')->name('home');
    route::get('/rules', 'rules')->name('rules');
    route::get('/info', 'info')->name('info');
    route::get('/project', 'project')->name('project');
    route::get('/myv', 'myv')->name('myv');
    route::get('/us', 'us')->name('us');
    route::get('/play', 'play')->name('play')->middleware('auth');
    route::get('/game', 'game')->name('game');
});

Route::controller(AuthController::class)->group(function () {
    route::get('/login', 'login')->name('login');
    route::post('/login', 'authenticate')->name('auth.authenticate');
    route::get('/register', 'register')->name('auth.register');
    route::post('/register', 'store')->name('auth.store');
    route::get('/profile', 'profile')->name('auth.profile');
    route::get('/logout', 'logout')->name('auth.logout');
});

Route::controller(PartidaController::class)->middleware('auth')->group(function () {
    route::get('/partidas', [PartidaController::class, 'partidas'])->name('partidas.index');
    route::get('/partidas/create', [PartidaController::class, 'create'])->name('partidas.create');
    route::post('/partidas/store', [PartidaController::class, 'store'])->name('partidas.store');
    route::get('/partidas/{id}', [PartidaController::class, 'show'])->name('partidas.show');
    route::post('/partidas/{id}/vaciar', [PartidaController::class, 'vaciar'])->name('partidas.vaciar');
    route::post('/partidas/{id}/iniciar', [PartidaController::class, 'iniciar'])->name('partidas.iniciar');
    route::get('/partidas/{id}/jugar', [PartidaController::class, 'jugar'])->name('partidas.jugar');
    route::delete('/partidas/{partida}', [PartidaController::class, 'destroy'])->name('partidas.destroy');
    route::post('/partidas/{partida}/finalizar', [PartidaController::class, 'finalizar'])->name('partidas.finalizar');

});
