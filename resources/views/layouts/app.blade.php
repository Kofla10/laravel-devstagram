<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Destagram - @yield('title')</title>

        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">

        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                    Devstagram
                </h1>

                {{-- validamos si existe un usuario autenticado Auth()->user() --}}
                {{-- @if (Auth()->user())

                @else
                    <p class="font-medium text-lg uppercase text-gray-400">inicia sesión</p>
                @endif --}}

                {{-- forma mas facil de validar si el usuario esta autenticado --}}
                @auth
                <p class="font-medium text-lg uppercase text-gray-400">{{ Auth()->user()->username }}</p>

                    <nav class="flex gap-2 items-center">
                        <form action="{{ route('logout') }} "method="POST">
                            @csrf
                            <button class="font-bold uppercase text-gray-600 text-sm" href="{{ route('logout') }}">Cerrar Sesión</button>

                        </form>

                    </nav>
                @endauth

                @guest
                    <nav class="flex gap-2 items-center">
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login') }}">Login</a>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('register')}}">Crear Cuenta</a>
                    </nav>
                @endguest



                {{-- <nav class="flex gap-2 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login') }}">Login</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('register')}}">Crear Cuenta</a>
                </nav> --}}
            </div>

        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('title')
            </h2>

            @yield('content')
        </main>
        <footer class="text-center p-5 text-gray-500 font-bold mt-10">
            Devstagram - Todos los derechos reservados {{ now()->year }}
        </footer>
    </body>
</html>
