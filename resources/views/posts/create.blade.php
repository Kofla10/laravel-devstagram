@extends('layouts.app')

@section('title')
    Crea una Nueva Publicación
@endsection

@section('content')
    <div class="md:flex md:items-center">

        <div class="md:w-1/2 px-10">
            <!-- Example of a form that Dropzone can take over -->
            <form enctype="multipart/form-data" method="POST" action="{{ route('imagens.store') }}" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center"></form>
        </div>

        <div class="md:w-1/2 bg-gray-50 p-5 rounded-lg shadow-lg mt-10 md:mt-0">
            <form action="{{route('register')}}" method="POST" novalidate>
                @csrf

                <div class="mb-5">
                    <label
                        for="title"
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        placeholder="Título de la publicación"
                        {{-- para que no se borren los datos cuando envíe el formulario y tenga algún error --}}
                        value="{{old('title')}}"
                        class="border p-3 w-full rounded-2xl @error('name') border-red-400 @enderror">

                        @error('title')
                            <p class="mt-1 bg-red-400 text-white shadow-red-100 font-medium p-1 my-w rounded-xl text-center">{{$message}}</p>
                        @enderror

                </div>

                <div class="mb-5">
                    <label
                        for="description"
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción
                    </label>
                    <textarea
                        id="description"
                        name="description"
                        placeholder="Descripción de la publicación"
                        class = "border p-3 w-full rounded-2xl @error('name') border-red-400 @enderror"> {{old('description')}} </textarea>

                        @error('description')
                            <p class="mt-1 bg-red-400 text-white shadow-red-100 font-medium p-1 my-w rounded-xl text-center">{{$message}}</p>
                        @enderror


                    </div>

                    <input
                         type="submit"
                         value="Publicar"
                         class="p-2 bg-sky-600 hover:bg-sky-700 uppercase font-bold w-full text-white rounded-2xl transition-colors cursor-pointer"
                         >
            </form>
        </div>

    </div>
@endsection