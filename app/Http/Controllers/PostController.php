<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

    public function create(){
        return view('posts.create');
    }

    public function store(Request $data){

        $data->validate([
            'title'       => 'required|min:1|max:50',
            'description' => 'required|min:1',
            'imagen'      => 'required'
        ]);

        Post::create([
            'title'       => $data->title,
            'description' => $data->description,
            'imagen'      => $data->imagen,
            'user_id'     => auth()->user()->id
        ]);

        return redirect()->route('post.index', auth()->user()->username);
    }

}
