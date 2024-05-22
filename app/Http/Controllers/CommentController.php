<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // public function __construct(){
    //     //middleware es para validar que el usuario este autenticado
    //     $this->middleware('auth'); //con el metodo except() quitamos los proteción a los metodos que le pasemos, en este caso no es necesario estar logueados para ver el metodo de show
    // }

    public function store(Request $data, $post){


        $data->validate([
            'comment' => 'required|min:1'
        ]);

        dd($post);

        Comment::create([
            'comment' => $data->comment,
            'user_id' => auth()->user()->id,
            'post_id' => $post
        ]);

        dd($post);

        return view('posts.show', [
            'post' => $post
        ]);

    }
}
