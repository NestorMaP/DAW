@extends('layout')

@section('content')
    <div class="container">
        {{-- Práctica 6 --}}
        <p><strong>Listado de actores: </strong>
            @foreach($actors as $actor)
                <div>
                    <p><strong>Nombre: </strong>
                        <a href="{{ route('actors.show', $actor->id) }}">{{ $actor->person_name }}</a>
                    </p>
                    <p><strong>Películas: </strong>
                        <ul>
                            @foreach($actor->movieCast->take(5) as $cast)
                                <li>{{ $cast->movie->title }}</li>
                            @endforeach
                        </ul>
                    </p>
                </div>
            @endforeach
        <div>
            {{ $actors->links() }}
        </div>
@endsection
