{{-- Práctica 2 --}}
{{-- Práctica 3 (Nombre cambiado de list a index)--}}
@extends('layout')

@section('content')
    <h1>Listado de películas.</h1>
    @foreach($movies as $movie)
        <div>
            <p>Título: <a href="{{ route('movies.show', $movie->slug) }}">{{ $movie->title }}</a></p>
            <p>Nota: {{ $movie->vote_average }}.</p>
            <p>Sinopsis: {{ Str::limit($movie->overview, 200) }} .</p>
        </div>
        <br>
    @endforeach

    {{ $movies->links() }}
@endsection
