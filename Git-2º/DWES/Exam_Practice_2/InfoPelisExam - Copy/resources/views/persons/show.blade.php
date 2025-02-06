{{-- Práctica 6 --}}

@extends('layout')

@section('content')

    <h1>{{ $person->person_name }}</h1>
    <div class="container">
        <h2>Movies as director</h2>
        @if($directedMovies->isEmpty())
            <p>No ha dirigido ninguna película.</p>
        @else
            @foreach ($directedMovies as $crew)
                <a href="{{ route('movies.show', $crew->movie->id) }}">{{ $crew->movie->title }}, </a>
            @endforeach
        @endif
    </div>

    <div class="container">
        <h2>Movies as actor/actress</h2>
        @if($actedMovies->isEmpty())
            <p>No ha actudado en ninguna película</p>
        @else
            @foreach ($actedMovies as $cast)
                <a href="{{ route('movies.show', $cast->movie->id) }}">{{ $cast->movie->title }}, </a>
            @endforeach
        @endif
    </div>
@endsection
