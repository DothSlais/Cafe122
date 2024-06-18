<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Función para mostrar página de inicio
    public function __invoke()
{
    return view('home');
}
}