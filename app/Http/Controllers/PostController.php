<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct(){
        //middleware es para validar que el usuario este autenticado
        $this->middleware('auth');
    }

    public function index(User $user) {
        
        //con el auth podemos validar si el usuario esta autenticado
        // dd(auth()->user());
        return view('dashboard',[
            'user' => $user
        ]);
    }
}
