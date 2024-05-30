<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'imagen',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Indicar que estos campos son fechas
    // protected $dates = [
    //     'created_at', 'updated_at', // Agrega cualquier otro campo de fecha
    // ];

    public function posts(){
        //esto quiere decir que un usuario puede tenenr multiples post
        return $this->hasMany(Post::class);
    }
    public function comments(){
        //Esto quiere decir que un usuario puede hacer varios comentarios
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    //metodo para los seguidores
    public function followers(){
        //como nos salimos de las convenciones de laravel y agregamos dos relaciones de usuario a la misma tabla, tenemos que expecificar, user es al que se va a seguir y followes es la persona que da seguir
        return $this->belongsToMany(User::class, 'followes', 'user_id', 'follow');
    }

    //nos sirve para realizar el conteo de las personas a las que seguimios
    public function following(){
        //es para ver a los seguidores mios
        return $this->belongsToMany(User::class, 'followes', 'follow', 'user_id');
    }

    public function checkFollow(User $user){
        //en este caso podemos usar la función creada anteriormente
        return $this->followers->contains('follow', $user->id );
    }

    public function siguiendo(User $user){
        //para validara si ya esta en la tabla, retorna un true o false
        return $this->followers->contains($user->id);
    }

}
