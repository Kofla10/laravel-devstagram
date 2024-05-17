<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index() {
        return view('auth.register');
    }

    public static function store(Request $request){
        //muestra toda la información que viene del formulario
        // dd($request);
        //muestra solo el campo que especificamos
        // dd($request->get('username'));

        //realizar la validación del formulario
        // $this->validate($request, [
        //     'name'     => 'required',
        //     // 'username' => ['required', 'min:4', 'unique:users']
        // ]);

        // tomamos el request para realizar la validación
        $request->validate([
            'name'     => ['required', 'min:3', 'max:35'],
            'username' => ['required', 'min:3', 'max:15'],
            'email'    => ['required', 'email', 'max:45'],
            // si se poner confirmed, lo que hace que la contraseña de confirmacion sea igual al password
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        
        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => $request->password
        
        ]);
        
        dd($request);
    }
}
