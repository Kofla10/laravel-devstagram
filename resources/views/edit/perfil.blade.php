@extends('layouts.app')

@section('title')
    Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('content')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-gray-50 shadow p-6">
            <form action="{{ route('edit.store') }}" class="mt-10 md:mt-0" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label
                        for="name"
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Tu nombre
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Escribe tu nombre"
                        value= {{ auth()->user()->name }}
                        class="border p-3 w-full rounded-2xl @error('name') border-red-400 @enderror">

                        @error('name')
                            <p class="mt-1 bg-red-400 text-white shadow-red-100 font-medium p-1 my-w rounded-xl text-center">{{$message}}</p>
                        @enderror
                </div>

                <div>
                    <label
                        for="username"
                        class="mb-2 block uppercase text-gray-500 font-bold mt-3">
                        Nombre de Usuario
                    </label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        placeholder="Escribe el nombre de usuario"
                        value= {{ auth()->user()->username }}
                        class="border p-3 w-full rounded-2xl @error('username') border-red-400 @enderror">

                        @error('username')
                            <p class="mt-1 bg-red-400 text-white shadow-red-100 font-medium p-1 my-w rounded-xl text-center">{{$message}}</p>
                        @enderror
                </div>

                <div>
                    <label
                        for="imagen"
                        class="mb-2 block uppercase text-gray-500 font-bold mt-3">
                        Foto de Perfil
                    </label>

                    <input
                        type="file"
                        id="imagen"
                        name="imagen"
                        class=" p-3 w-full rounded-2xl "
                        >

                        <input
                            class="mt-4 p-2 bg-sky-600 hover:bg-sky-700 uppercase font-bold w-full text-white rounded-2xl transition-colors cursor-pointe"
                            type="submit"
                            value="Editar">
                </div>
            </form>
        </div>
    </div>


@endsection