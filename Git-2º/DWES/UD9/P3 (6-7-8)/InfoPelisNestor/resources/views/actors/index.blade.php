@extends('layout')

@section('content')
    <div class="container">
        {{-- Práctica 6 --}}
        <p><strong>Listado de actores: </strong>
            @foreach($actors as $actor)
                <div>
                    <p><strong>Nombre: </strong><a href="{{ route('actors.show', $actor->id) }}">{{ $actor->person_name }}</a></p>
                    <p><strong>Películas: </strong>
                        @foreach($actor->movieCast->take(5) as $cast)
                            <li>{{ $cast->movie->title }}</a></li>
                        @endforeach
                    </p>
                </div>
            @endforeach
@endsection
