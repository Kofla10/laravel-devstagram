<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(auth());
    }
    //usamos el __invoke cuando usamos un solo metodo, que se refiere a autoinvocable, automaticamente se manda a llamar, no es necesario usar el index
    public function __invoke(){
        //get the people tha followers


        //para ver los atributos de las personas a las que seguimos
        // dd(auth()->user()->following->toArray());
        // dd(auth()->user()->following->pluck('id')->toArray()); //usamos pluck para especificar que campos queremos, de arreglos que se tiene

        $ids = auth()->user()->following->pluck('id')->toArray();
        
        //usamos lastest() para ordenar por ultima publicación
        $post = Post::whereIn('user_id', $ids)->latest()->paginate(20);

        return view('home', [
            'posts' => $post
        ]);
    }
}
