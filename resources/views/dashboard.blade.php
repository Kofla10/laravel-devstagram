@extends('layouts.app')

@section('title')
    Perfil: {{$user->username}} 
@endsection

@section('content')

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="sm:w-8/12 lg:w-6/12 px-5">
                <img  src="{{ $user->imagen? asset('perfiles').'/'.$user->imagen  : asset('imgs/usuario.svg') }}" alt="Users Image">
            </div>

            <div class="w-8/12 lg:w-6/12 px-5 flex md:justify-center flex-col items-center py-10 md:py-10 md:items-start">
                <div class="flex items-center gap-3">
                    <p class="text-gray700 text-2xl uppercase mb-3">{{ $user->name }}</p>

                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{route('edit.perfil')}}" class="text-gray-500 hover:text-gray-800 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </a>
                        @endif
                    @endauth

                </div>
                <p class=" text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->followers->count() }} <span class="font-normal"> @choice('Segidor|Seguidores', $user->followers->count() )</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {} <span class="font-normal">Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $posts->count() }} <span class="font-normal">Publicaciones</span>
                </p>

               @auth
                @if (auth()->user()->id != $user->id)
                    <div class="flex gap-2 items-center">
                    {{-- {{ dd( $user->siguiendo( auth()->user()) ) }} --}}
                        @if(!$user->siguiendo( auth()->user()))
                            <div>
                                <form action="{{ route('follow', $user) }}" method="POST">
                                    @csrf
                                    <input
                                        type="submit"
                                        class="bg-sky-600 text-white font-bold px-4 shadow-lg rounded-lg"
                                        value="Seguir">
                                </form>
                            </div>
                        @else
                            <div>
                                <form action="{{ route('delete.follower', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input
                                        type="submit"
                                        class="bg-gray-600 text-white font-bold px-4 shadow-lg rounded-lg"
                                        value="Suiguiendo">

                                </form>
                            </div>
                        @endif
                    </div>
                @endif

               @endauth
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