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
        $this->belongsTo(User::class)->select(['name', 'username']);
    }
}