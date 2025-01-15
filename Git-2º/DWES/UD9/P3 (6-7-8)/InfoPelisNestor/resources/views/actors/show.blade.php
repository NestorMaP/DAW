@extends('layout')

@section('content')
    <div class="container">
        {{-- Práctica 6 --}}
        <h1>{{ $person->name }}</h1>
    <h2>Películas:</h2>
    <ul>
        @foreach ($person->movieCast as $cast)
            <li>
                <a href="{{ route('movies.show', $cast->movie->id) }}">
                    {{ $cast->movie->title }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
