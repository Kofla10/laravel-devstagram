<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;

    public function render()
    {
        //hacemos un if, para validar dinamicamente si el usuario dio like a la puliblicación
        if($this->post->checkLikes(auth()->user())){
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            return back()->with('mensaje', '-1 Like');
        } else {
            

            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
        }
    }

    public function like(){
        return "desde la funcion de like";
    }
}
