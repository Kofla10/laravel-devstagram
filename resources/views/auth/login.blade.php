@extends('layouts.app')

@section('title')
    Inicia Sesión en Devstagram
@endsection


@section('content')
    <div class="md:flex md:justify-center md:gap-6 md:items-center">
        {{-- md:w-1/2 toma el 50% --}}
        <div class="md:w-7/12 p-5">
            <img src="{{asset('imgs/login.jpg')}}" alt="">
        </div>
        <div class="md:w-4/12 bg-gray-50 p-6 rounded-lg shadow-lg">
            {{-- ESPECIFICAMOS EL METODO POST, PARA QUE ENE --}}
            {{-- novalidate desactiva la validacion de html5 --}}
            <form action="{{route('login')}}" method="POST" novalidate>
                @csrf

                @if (session('mensaje') )
                    <p class="text-red-500 text-center font-semibold"> {{ session('mensaje') }} </p>
                @endif

                <div class="mb-5">
                    <label
                        for="email"
                        class="mb-2 block uppercase text-gray-500 font-bold text-center">
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
                        class="mb-2 block uppercase text-gray-500 font-bold text-center">
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

                <div class="md-5 justify-center flex">
                    <input type="checkbox" name="remenber" id="remenber">
                    <label for="remenber" class=" ml-2 text-sm text-gray-500 font-bold uppercase">Recordarme</label>
                </div>

                <input
                    type="submit"
                    value="Ingresar"
                    class="p-2 mt-2 bg-sky-600 hover:bg-sky-700 uppercase font-bold w-full text-white rounded-2xl transition-colors cursor-pointer"
                    >

            </form>
        </div>
    </div>
@endsection