<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id'
    ];

    public function post (){
        //quiere decir que un like puede
        return $this->hasMany(Post::class);
    }

    public function user(){
        //quiere decir que un like pertenece a un solo usuario
        return $this->belongsTo(User::class);
    }
}
