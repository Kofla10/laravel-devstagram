<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FolloweController extends Controller
{

    public function store(User $user){
        $follower = auth()->user(); // Obtiene el usuario autenticado que quiere seguir a otro

        //este seria el metodo tradiccional
        // Followe::create([
        //     'user_id' => auth()->user()->id,
        //     'follow'  => $user->id
        // ]);

        //tambien podemos usar la relación que creamos en el modelo de usuario
        // em medodo attach es util cuando tengamos relaciones de muchos a muchos
        $user->followers()->attach(auth()->user()->id);

        return back();
    }

    public function destroy(User $user){

        $user->followers()->where('follow', auth()->user()->id)->delete();

        return back();

    }

}
