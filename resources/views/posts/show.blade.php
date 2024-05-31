@extends('layouts.app')

@section('title')

     {{ $post->title }}
@endsection

@section('content')

    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <div class="">
                <img src = "{{ asset('uploads').'/'.$post->imagen }}" alt = "{{ $post->title }}">
            </div>

            <div class="p-3 flex items-center gap-2">

                @auth

                    <livewire:like-post :post="$post">
                    {{-- @if ($post->checkLikes(auth()->user()))
                        <form action="{{ route('delete.like', ['post'=> $post]) }}" method="POST">
                            @csrf
                            @method('DELETE')

                        </form>
                    @else
                        <form action="{{ route('like.post', ['post'=> $post]) }}" method="POST">
                            @csrf
                                <button
                                    type="submit"
                                    class=" text-black font-bold  hover:bg-red-600 rounded-lg shadow-gray-500  cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>
                                </button>
                        </form>
                    @endif --}}
                @endauth

                {{-- <p>{{ $post->likes->count() }} @choice('like|likes', $post->likes->count())</p> --}}
            </div>
            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">
                    {{ $post->created_at->diffForHumans() }}
                </p>

                <p class="mt-5 text-gray-600 font-medium text-lg">
                    {{ $post->description }}
                </p>
            </div>

            @auth
                <div class="flex gap-3 mt-2">
                    @if ($post->user_id === auth()->user()->id )
                        <div>
                            <form action="{{ route('post.destroy', $post) }}" method="POST">
                                {{-- method spofing --}}
                                @method('DELETE')
                                @csrf
                                <input
                                    type="submit"
                                    value="Eliminar"
                                    class="p-2 text-white font-bold bg-red-500 hover:bg-red-600 rounded-lg shadow-gray-500  cursor-pointer">
                            </form>
                        </div>
                    @endif

                    <div>



                    </div>
                @endauth
            </div>
        </div>
        <div class="md:w-1/2 p-5">
            <div class=" bg-gray-50 p-6 rounded-lg shadow-lg">
                    @auth
                        <p class="text-xl font-bold text-center mb-4">
                            Añadir un nuevo comentario
                        </p>
                        @if (session('mensaje') )
                                <p class="text-green-400 text-center text-lg font-semibold"> {{ session('mensaje') }} </p>
                            @endif

                        <form action="{{ route('comment.add', [$user, $post]) }}" method="POST" novalidate>
                            @csrf

                            <div class="mb-5">

                                <label
                                    for= "comment"
                                    class= "mb-2 block uppercase text-gray-500 font-bold">
                                    Comentario
                                </label>

                                <textarea
                                id = "comment"
                                name = "comment"
                                placeholder = "Descripción de la publicación"
                                class = "border p-3 w-full rounded-2xl @error('comment') border-red-400 @enderror"> </textarea>

                                @error('comment')
                                    <p class= "mt-1 bg-red-400 text-white shadow-red-100 font-medium p-1 my-w rounded-xl text-center">{{$message}}</p>
                                @enderror
                            </div>

                            <input
                                type="submit"
                                value="Comentar"
                                class="p-2 mt-2 bg-sky-600 hover:bg-sky-700 uppercase font-bold w-full text-white rounded-2xl transition-colors cursor-pointer">
                        </form>
                    @endauth

                    <div class="mt-5 bg-white shadow mb-5 max-96 overflow-y-scroll rounded-sm">
                        @if ($post->comments)
                            @foreach ($post->comments as $comment)
                                <div class="p-5 border-gray-300 border-b ">
                                    <a href="{{ route('post.index',   $comment->user) }}">{{ $comment->user->username }}</a>
                                    <p class="">{{ $comment->comment }} </p>
                                    <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                </div>
                            @endforeach
                        @else
                        <p>No hay comentarios</p>
                        @endif

                    </div>
                </div>


        </div>
    </div>
@endsection


