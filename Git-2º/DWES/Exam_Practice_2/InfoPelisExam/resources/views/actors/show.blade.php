{{-- Práctica 6 --}}

@extends('layout')

@section('content')

<h2>{{ $personCast->person_name }}</h2>
<div class="container">
    {{-- Práctica 6 --}}

    <h1>{{ $personCast->name }}</h1>
<h2>Películas:</h2>
<ul>
    @foreach ($personCast->movieCast as $cast)
        <li>
            <a href="{{ route('movies.show', $cast->movie->id) }}">
                {{ $cast->movie->title }}
            </a>
        </li>
    @endforeach

</ul>
{{--
<h3>Movies as actor/actress:</h3>
    <ul>
        @foreach ($actingMovies as $movie)
            <li><a href="{{ route('movies.show', $movie->id) }}">{{ $movie->title }}</a></li>
        @endforeach
    </ul>

<h3>Movies as Director:</h3>
    <ul>
        @foreach ($directedMovies as $movie)
            <li><a href="{{ route('movies.show', $movie->id) }}">{{ $movie->title }}</a></li>
        @endforeach
    </ul>
--}}
@endsection
