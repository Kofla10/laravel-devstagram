<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $data){

        // dd($data->remenber);

        $data->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($data->only('email', 'password'))){
            //el back() es para regresar a la página anterio y el with() es para enviar el mensaje de error, 'mensaje' es el nombre con el que imprimimos el mensaje en la vista
            return back()->with('mensaje', 'Credenciales Incorrectas');
        }

        return redirect()->route('post.index');

    }
}
