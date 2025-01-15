@extends('layout')

@section('content')
    <div class="container">
        <h1>{{ $movie->title }}</h1>
        <p><strong>ID:</strong> {{ $movie->id }}</p>
        <p><strong>Director:</strong> <a href="{{ route('actors.show', $movie->director->person->id) }}">
            {{ $movie->director->person->name }}
        </a></p>
        <p><strong>Budget:</strong> {{ $movie->budget }} USD</p>
        <p><strong>Homepage:</strong> {{ $movie->homepage }}</p>
        <p><strong>Overview:</strong> {{ $movie->overview }}''</p>
        <p><strong>Popularity:</strong> {{ $movie->popularity }}</p>
        <p><strong>Release Date:</strong> {{ $movie->release_date }}</p>
        <p><strong>Revenue:</strong> {{ $movie->revenue }}</p>
        <p><strong>Runtime:</strong> {{ $movie->runtime }}</p>
        <p><strong>Movie Status:</strong> {{ $movie->movie_status }}</p>
        <p><strong>Tagline:</strong> {{ $movie->tagline }}</p>
        <p><strong>Vote Average:</strong> {{ $movie->vote_average }}</p>
        <p><strong>Vote Count:</strong> {{ $movie->vote_count }}</p>

        {{-- Práctica 6 --}}
        <p><strong>Actores: </strong>
            @foreach ($movie->movieCast->take(10) as $cast)
                    {{$cast->person->person_name}},
            @endforeach
            <a href="{{ route('movies.cast', $movie->id) }}">Resto del Casting</a>
        </p>
        <p><strong>Personajes: </strong><a href="{{ route('movies.characters', $movie->id) }}">Lista de personajes</a></p>

        <a href="{{ route('movies.edit', $movie->id) }}">Editar película</a>
    </div>
        <br>
        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" style="color:red">Eliminar película</button>
        </form

@endsection
