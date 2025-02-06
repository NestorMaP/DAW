{{-- Práctica 2 --}}
{{-- Práctica 3 (Nombre cambiado de movie a show)--}}
@extends('layout')

@section('content')
{{-- Añadido listado en Práctica 5.3 --}}
    <div class="container">
        <h1>{{ $movie->title }}</h1>
        <p><strong>ID:</strong> {{ $movie->id }}</p>
        {{-- Director. Práctica 6 --}}
            <p>
                <strong>Director:</strong>
                <a href="{{route('actors.show',$movie->director->person->id)}}">
                    {{ $movie->director->person->person_name }}
                </a>
            </p>
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

        {{-- 10 Actores. Añadido en Práctica 6 --}}
        <p><strong>Actores: </strong>
            @foreach ($movie->movieCast->take(10) as $cast)
                {{ $cast->person->person_name }},
            @endforeach
            <a href="{{ route('movies.characters', $movie->id) }}">Resto del Casting</a> {{-- cambio slug "$movie->slug"--}}
        </p>

        {{-- Práctica 7 Image --}}
        @if ($movie->image)
            <img src="{{ asset($moviesImgPath . '/' . $movie->image) }}" alt="Image of {{ $movie->title }}" style="width:100px;">
        @else
            <img src="{{ asset('storage/movies_img/no_image.png') }}" alt="No disponible" style="width:100px;">
        @endif
        <br><br>

        <a href="{{ route('movies.edit', $movie->slug) }}">Editar película</a>
    </div>
        <br>
        {{-- Botón Eliminar añadido en Práctica 5.4 --}}
        <form action="{{route('movies.destroy', $movie->id)}}" method="POST">
            @csrf
            @method('delete')
            <input type="submit" style="color:red" value="Eliminar">
        </form>
@endsection
