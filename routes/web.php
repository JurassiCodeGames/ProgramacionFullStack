<?php

use Illuminate\Support\Facades\Route;

Route::get('/play', function () {
    return view('play');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/rules', function () {
    return view('rules');
});

Route::get('/info', function () {
    return view('info');
});

Route::get('/project', function () {
    return view('project');
});

Route::get('/myv', function () {
    return view('myv');
});

Route::get('/us', function () {
    return view('us');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

