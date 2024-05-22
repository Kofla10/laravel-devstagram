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

            <div class="p-3">
                <p>0 like</p>
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
        </div>
        <div class="md:w-1/2 p-5">
            <div class=" bg-gray-50 p-6 rounded-lg shadow-lg">
                    @auth
                        <p class="text-xl font-bold text-center mb-4">
                            Añadir un nuevo comentario
                        </p>

                        <form action="{{ route('comment.add', [$user, $post]) }}" method="POST" novalidate>
                            @csrf

                            @if (session('mensaje') )
                                <p class="text-red-500 text-center font-semibold"> {{ session('mensaje') }} </p>
                            @endif

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
                </div>


        </div>
    </div>
@endsection


