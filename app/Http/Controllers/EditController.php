<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EditController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('edit.perfil');
    }

    public function store(Request $data){

        $data->request->add(['username' => Str::slug($data->username)]);
        //  con el 'unique:users,username,' .auth()->user()->id, podemos validar que si es el mismo nombre de usernar, no valide que ya esta en la base de datos
        $data->validate( [
            'name'     => ['required','min:3','max:35'],
            'username' => ['required', 'min:3', 'unique:users,username,' .auth()->user()->id, 'max:15']
        ]);

        if($data->imagen ){
            $imagen    = $data->file('imagen');
            $nameImg   = Str::uuid().".".$imagen->extension(); //cambiamos el nombre a la imgagen
            $imgServer = Image::make($imagen); // Procesamos la imagen y para podrla guardar en el servidor
            $imgServer->fit(1000, 1000, null); //para especificar el alto y ancho maximo
            $imgPath = public_path('perfiles').'/'.$nameImg;
            $imgServer->save($imgPath); //guardamos la imagene en el servidor
        }

        // dd($nameImg, auth()->user()->imagen);
        $user = User::find(auth()->user()->id);
        $user->update([
                'name'     => $data->name,
                'username' => $data->username,
                'imagen'   => $nameImg ?? auth()->user()->imagen
            ]);

        //otra forma de realizar un update
        // $user->username = $data->username;
        // $user->imagen   = $nameImg;
        // $user->name     = $data->name;

        return redirect()->route('post.index', $user);
    }
}