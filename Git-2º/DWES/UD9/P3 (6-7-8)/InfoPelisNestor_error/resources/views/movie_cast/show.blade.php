@extends('layout')

@section('content')
    <div class="container">
        <h1>{{ $movieCast->movie->title }}</h1>

         @dd($movieCast)
        {{-- Práctica 6 --}}
        <p><strong>Actores: </strong>
            @foreach ($movieCast as $cast)
                <div>
                    {{$cast->person->person_name}},
                </div>
            @endforeach

@endsection
