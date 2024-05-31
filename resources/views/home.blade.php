@extends('layouts.app')

@section('title')
    Principal
@endsection

@section('content')

{{-- para usar un componente siempre es con x- y termina con el nombre del component --}}
{{-- posts="$posts" de esta forma le paso el posts al componente  --}}
    <x-list-post :posts="$posts"/>


@endsection