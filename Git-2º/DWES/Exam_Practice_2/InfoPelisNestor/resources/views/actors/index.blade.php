{{-- Práctica 3 --}}
@extends('layout')
@section('content')
<div class="container">
    {{-- Práctica 6 --}}
    <h1>Listado de actores:</h1>
        @foreach($actors as $actor)
            <div>
                <p><strong>Nombre: </strong>
                    <a href="{{ route('persons.show', $actor->id) }}">{{ $actor->person_name }}</a>
                </p>
                <p><strong>Películas: </strong>
                    <ul>
                        @foreach($actor->movieCast->take(5) as $movies)
                            <li>{{ $movies->movie->title }}</li>
                        @endforeach
                    </ul>
                </p>
            </div>
            <br>
        @endforeach
    <div>
        {{ $actors->links() }}
    </div>


@endsection
