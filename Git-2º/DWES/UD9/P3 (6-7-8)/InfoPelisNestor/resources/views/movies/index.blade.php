@extends('layout')

@section('content')

    <h1>Listado de películas</h1>
    {{-- <p>Próximamente aquí podrás observar todas las películas de las que disponemos. Que la fuerza te acompañe.</p> --}}

    @foreach ($movies as $movie)
        <div>
            <p>Título: <a href="{{ route('movies.show', $movie->id) }}">{{ $movie->title }}</a></p>
            <p>Nota: {{ $movie->vote_average }}.</p>
            <p>Sinopsis: {{ Str::limit($movie->overview, 200) }}</p>
        </div>
    @endforeach

    {{ $movies->links() }}
@endsection
