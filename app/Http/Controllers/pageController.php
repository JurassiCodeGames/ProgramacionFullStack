<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    public function home() {
        return view('home');
    }

    public function rules() {
        return view('rules');
    }

    public function info() {
        return view('info');
    }

    public function project() {
        return view('project');
    }

    public function myv() {
        return view('myv');
    }

    public function us() {
        return view('us');
    }

    public function register() {
        return view('register');
    }

    public function login() {
        return view('login');
    }

    public function play() {
        return view('play');
    }

    public function game() {
        return view('game');
    }
}
