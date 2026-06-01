<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Esta es la función que busca la ruta para pintar tu panel azul marino
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}