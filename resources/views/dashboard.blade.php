@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('imgs/usuario.svg') }}" alt="Users Image">
            </div>

            <div class="md:w-8/12 lg:w-6/12 px-5 ">
                <p class="text-gray700 text-2xl uppercase">{{ auth()->user()->name }}</p>
            </div>
        </div>

    </div>

@endsection