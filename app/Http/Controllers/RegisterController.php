<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        //realizamos la validación antes de que se realice la validación para que el usuario vea en pantalla
        $request->request->add(['username' => Str::slug($request->username)]);

        // tomamos el request para realizar la validación
        $request->validate([
            'name'     => 'required|min:3|max:35',
            'username' => 'required|min:3|max:15|unique:users',
            'email'    => 'required|email|max:45|unique:users|email',
            // si se poner confirmed, lo que hace que la contraseña de confirmacion sea igual al password
            'password' => ['required', 'confirmed', 'min:1'],
        ]);


        User::create([
            // Str::slug($title) transforma el texto en una url, en los espacios le asigna un guion
            'name'     => Str::lower($request->name),
            'username' => $request->username,
            'email'    => Str::lower($request->email),
            'password' => Hash::make($request->password)

        ]);

        //con el siguiente bloque de código autenticamos al usario antes de realizar la redirección

        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);

        //otra forma de realizar la autenticación
        auth()->attempt($request->only('email', 'password'));

        //Hacemos que se redireccione a la ruta del muro
        return redirect()->route('post.index', auth()->user()->username);

    }
}
