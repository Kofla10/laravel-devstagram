<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment',
        'post_id',
        'user_id'
    ];

    public function post(){
        //quiere decir que un comentario pertenece a un solo post
        return $this->belongsTo(Post::class);
    }

    public function user(){
        //que un comentario pertenece a un solo usuario
        return $this->belongsTo(User::class);
    }
}
