@extends('layouts.app')

@section('title')
    Perfil: {{$user->username}}
@endsection

@section('content')

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="sm:w-8/12 lg:w-6/12 px-5">
                <img  src="{{ asset('imgs/usuario.svg') }}" alt="Users Image">
            </div>

            <div class="w-8/12 lg:w-6/12 px-5 flex md:justify-center flex-col items-center py-10 md:py-10 md:items-start">
                <p class="text-gray700 text-2xl uppercase mb-3">{{ $user->name }}</p>
                <p class=" text-gray-800 text-sm mb-3 font-bold">
                    0 <span class="font-normal">Seguidores</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0 <span class="font-normal">Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0 <span class="font-normal">Publicaciones</span>
                </p>
            </div>
        </div>

    </div>

    <section class="container mx-auto mt-10 ">
        <h2 class="text-4xl text-center font-black my-10">
            Publicaciones
        </h2>

        @if ($posts->count())
        
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                
                 @foreach ($posts as $post)

                    <a href="{{ route('post.show', [$user, $post]) }}">
                        <img src="{{ asset('uploads').'/'.$post->imagen }}" alt="{{ $post->title }}">
                    </a> 
                @endforeach
            </div>
            <div class=" mt-4 font-bold text-black">
                {{ $posts->links() }}
            </div>

        @else

                <p  class="font-bold text-center text-sm uppercase shadow-gray-200 text-gray-500">No hay publicaciones disponibles</p>

        @endif

    </section>

@endsection