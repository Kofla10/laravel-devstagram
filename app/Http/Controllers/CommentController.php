<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // public function __construct(){
    //     //middleware es para validar que el usuario este autenticado
    //     $this->middleware('auth'); //con el metodo except() quitamos los proteción a los metodos que le pasemos, en este caso no es necesario estar logueados para ver el metodo de show
    // }

    public function store(Request $data, Post $post){


        $data->validate([
            'comment' => 'required|min:1'
        ]);

        Comment::create([
            'comment' => $data->comment,
            'user_id' => auth()->user()->id,
            'post_id' => $post->id
        ]);

        // return view('posts.show', [
        //     'post' => $post
        // ]);

        //Realizar la impresion de un mensaje
        return back()->with('mensaje', 'Se añadio tu comentarió');

    }
}
