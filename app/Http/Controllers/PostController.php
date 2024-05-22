<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct(){
        //middleware es para validar que el usuario este autenticado
        $this->middleware('auth')->except(['show', 'index']); //con el metodo except() quitamos los proteción a los metodos que le pasemos, en este caso no es necesario estar logueados para ver el metodo de show
    }

    public function index(User $user) {
        //con el auth podemos validar si el usuario esta autenticado
        // dd(auth()->user());

        //realizamo el where, para poder filtrar la información, se debe de poner el get() para que la consultra trainga los datos
        // $posts = Post::where('user_id', $user->id)->get();

        //usamos el paginate(cantidad) para poder realizar la paginación de los elementos que vamos a mostrar
        // $posts = Post::where('user_id', $user->id)->simplePaginate(6);
        $posts = Post::where('user_id', $user->id)->paginate(12);

        return view('dashboard',[
            'user'  => $user,
            'posts' => $posts
        ]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $data){

        $data->validate([
            'title'       => 'required|min:1|max:50',
            'description' => 'required|min:1',
            'imagen'      => 'required'
        ]);

        // Post::create([
        //     'title'       => $data->title,
        //     'description' => $data->description,
        //     'imagen'      => $data->imagen,
        //     'user_id'     => auth()->user()->id
        // ]);

        //otra forma de crear un registro
        //creamos una instancia del modelo
        // $post = new Post();
        // //la información automaticamente se guarda en la base de datos
        // $post->title       = $data->title;
        // $post->description = $data->description;
        // $post->imagen      = $data->imagen;
        // $post->user_id     = auth()->user()->id;

        //Creamos un inser usando las relaciones que se crearon
        //usamos la data, como tenemos un usario autenticado usamos el uses, seleccionamos la relacion que creamos y luedo el metodo create, es similiar a la primera forma que usamos para realizar el insert
        $data->user()->posts()->create([
            'title'       => $data->title,
            'description' => $data->description,
            'imagen'      => $data->imagen,
            'user_id'     => auth()->user()->id
        ]);


        return redirect()->route('post.index', auth()->user()->username);
    }

    public function show(User $user, Post $post){
        return view('posts.show', [
            'user' => $user,
            'post' => $post
        ]);
    }

}
