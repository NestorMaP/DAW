@extends('layout')

@section('content')
    <div class="container">
        <h1>{{ $movie->title }}</h1>

        {{-- Práctica 6 --}}
        <p><strong>Actores: </strong>
            @foreach ($movie->movieCast as $cast)
                <ul>
                    <li>{{$cast->person->person_name}}</li>
                </ul>
            @endforeach

@endsection
