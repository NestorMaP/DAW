@extends('layout')

@section('content')
    <h1>Ficha de la película <i>id_de_la_movie</i> {{ $id }}</h1>
    <p>Detalles sobre la película...</p>
    <a href="{{ route('movies.edit', $id) }}">Editar película</a>
@endsection
