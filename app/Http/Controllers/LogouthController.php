<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogouthController extends Controller
{
    public function index(){
        //este metodo nos sirve para cerrar la sesión, pero puede ser un poco inseguro, si se hace la petición con el get, lo mas recomendable es hacerlo con el post y enviar el token de la sesión @csrf
        auth()->logout();
        return redirect()->route('login');
    }
}
