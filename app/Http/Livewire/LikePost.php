<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component{

    public $post;
    public $isLike;
    public $likeCounts;

    //es el ciclo de vida de un livewire, es como un constructor en php
    public function mount($post){ //esta funcion con este metodo es lo primero que se ejecuta
        // islike es tipo boolean y validamos si el usuario ya le dio like
        $this->isLike     = $post->checkLikes(auth()->user());
        $this->likeCounts = $post->likes->count();
    }

    public function render()
    {
        return view('livewire.like-post');
    }

    public function like(){

        //hacemos un if, para validar dinamicamente si el usuario dio like a la puliblicación
        if($this->post->checkLikes(auth()->user())){
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            $this->isLike = false; //reescribimmos para que se ejecute el mount nuevamente
            $this->likeCounts--;

        } else {


            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLike = true; //reescribimmos para que se ejecute el mount nuevamente
            $this->likeCounts++;
        }
    }
}
