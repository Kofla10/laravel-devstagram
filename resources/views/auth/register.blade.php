@extends('layouts.app')

@section('title')
    Registrate en Devstagram
@endsection


@section('content')
    <div class="md:flex md:justify-center md:gap-6 md:items-center">
        {{-- md:w-1/2 toma el 50% --}}
        <div class="md:w-7/12 p-5">
            <img src="{{asset('imgs/registrar.jpg')}}" alt="">
        </div>
        <div class="md:w-4/12 bg-gray-50 p-6 rounded-lg shadow-lg">
            {{-- ESPECIFICAMOS EL METODO POST, PARA QUE ENE --}}
            {{-- novalidate desactiva la validacion de html5 --}}
            <form action="{{route('register')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label
                    {{-- si en el label pones for y no id, cuando presiones en el label se activa el input --}}
                        for="name"
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Tu nombre"
                        {{-- para que no se borren los datos cuando envíe el formulario y tenga algún error --}}
                        value="{{old('name')}}"
                        class="border p-3 w-full rounded-2xl @error('name') border-red-400 @enderror">

                        @error('name')
                            <p class="mt-1 bg-red-400 text-white shadow-red-100 font-medium p-1 my-w rounded-xl text-center">{{$message}}</p>
                        @enderror
                </div>

                <div class="mb-5">
                    <label
                        for="username"
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre de Usuario
                    </label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        placeholder="Tu Nombre de Usuario"
                        value="{{old('username')}}"
                        class="border p-3 w-full rounded-2xl @error('username') border-red-400 @enderror">

                        @error('username')
                            <p class="mt-1 bg-red-400 text-white shadow-red-100 font-medium p-1 my-w rounded-xl text-center">{{$message}}</p>
                        @enderror
                </div>

                <div class="mb-5">
                    <label
                        for="email"
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Correo
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Tu Correo"
                        value= "{{old('email')}}"
                        class="border p-3 w-full rounded-2xl @error('email') border-red-400  @enderror">

                        @error('email')
                            <p class="text-center font-medium text-white bg-red-400 mt-1 p-2 rounded-2xl shadow-sm">{{$message}}</p>
                        @enderror
                </div>

                <div class="mb-5">
                    <label
                        for="password"
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña
                    </label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Contraseña de Registro"
                        class="border p-3 w-full rounded-2xl @error('password') border-red-400 @enderror">

                        @error('password')
                            <p class="bg-red-400 text-white font-medium p-2 mt-1 rounded-2xl shadow-2xl text-center">{{$message}}</p>
                        @enderror
                </div>

                <div class="mb-5">
                    <label
                        for="password_confirmation"
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir Contraseña
                    </label>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Repetir Contraseña"
                        class="border p-3 w-full rounded-2xl">
                </div>

                <input
                    type="submit"
                    value="Registrase"
                    class="p-2 bg-sky-600 hover:bg-sky-700 uppercase font-bold w-full text-white rounded-2xl transition-colors cursor-pointer"
                    >

            </form>
        </div>
    </div>
@endsection
