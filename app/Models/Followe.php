<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followe extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'follow'
    ];

    // public function user(){
    //     return $this->hasMany(User::class);
    // }
}
