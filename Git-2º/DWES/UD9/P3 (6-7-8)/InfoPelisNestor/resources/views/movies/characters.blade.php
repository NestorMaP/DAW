{{--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Characters</title>
    <link rel="stylesheet" href="{{ asset('./css/style.css') }}">
</head>
<body>
    <h1>Película</h1>
    <div class="break">
        @foreach($characters as $character)
            <div class="character">
                <p>Personaje: {{ $character['character_name'] }}</p>
                <p>Actor: {{ $character['person_name'] }}</p>
                <p>Sexo: {{ $character['gender'] }}</p>
            </div>
            @if(($loop->index + 1) % 4 == 0)
                <div class="break"></div>
            @endif
        @endforeach
    </div>
</body>
</html>
--}}
@extends('layout')

@section('content')
    <div class="container">
        <h1>{{ $movie->title }}</h1>

        {{-- Práctica 6 --}}
            @foreach ($movie->movieCast as $character)
                <div>
                    <p><strong>Personaje: </strong>{{$character->character_name}}</p>
                    <p><strong>Actor: </strong><a href="{{ route('actors.show', $character->person) }}">{{ $character->person->person_name }}</a></p>
                    <p><strong>Género: </strong>{{$character->gender->gender}}</p>
                    <br>
                </div>
            @endforeach

@endsection
<a href="{{ route('actors.show', $character->person) }}">{{ $character->person->person_name }}</a>
