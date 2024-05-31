<div>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
   {{-- en este bloque primero validamos que exista un registro, luego hacemos el recorrido  --}}
   @if ($posts->count())

   <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

       @foreach ($posts as $post)

           <a href="{{ route('post.show', [$post->user,$post]) }}">
               <img src="{{ asset('uploads').'/'.$post->imagen }}" alt="{{ $post->title }}">
           </a>
       @endforeach
   </div>
   <div class=" mt-4 font-bold text-black">
       {{ $posts->links() }}
   </div>


    @else
    <p class="text-center">No hay publicaciones, sigue a alguien para poder ver post</p>
    @endif
</div>