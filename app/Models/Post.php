<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    //En laravel es obligatorio crear la variable $fillable para saber cuales datos se le van a enviar a la basa de datos, se hace para proteger
    protected $fillable = [
        'title',
        'description',
        'imagen',
        'user_id'
    ];

    public function user(){
        //esto quiere decir que un post pertenece a un usuario
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }

    public function comments(){
        //Quiere decier que un post puede tener varios comentarios
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    //funcion que usa el contains, para validar que si un id esta en la tabla
    public function checkLikes(User $user){
        //En este caso podemos validar si el usuario esta registrado en la tabla like, lo usamos con la relación de like que creamos anteriormente
        return $this->likes->contains('user_id', $user->id);
    }
}