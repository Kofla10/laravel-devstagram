<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $data, Post $post){

        if($post->checkLikes($data->user())){

            return back()->with('mensaje', '-1 Like');

        } else{

            $like = new Like([
                'user_id' => $data->user()->id
            ]);

            $post->likes()->save($like);

            return back()->with('mensaje', '+1 Like');
        }

        return back()->with('mensaje', 'No fue posible registrar el like');
    }

    public function destroy(Request $data, Post $post){
        // dd('Eliminando like');
        $data->user()->likes()->where('post_id', $post->id)->delete();
        return back()->with('mensaje', '-1 Like');
    }
}
