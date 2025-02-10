@extends('layout')

@section('content')
    <div class="container">
        <h1>{{ $movie->title }}</h1>

        {{-- Práctica 6 --}}
            @foreach ($movie->movieCast as $character)
                <div>
                    <p><strong>Personaje: </strong>{{ $character->character_name}}</p>
                    <p><strong>Actor: </strong><a href="{{ route('actors.show', $character->person->id) }}">{{$character->person->person_name}}</a></p>
                    <p><strong>Género: </strong>{{ $character->gender->gender}}</p>
                <div>
                <br>
            @endforeach

@endsection
