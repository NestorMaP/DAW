{{-- Práctica 3 --}}
@extends('layout')

@section('content')
    <h1>Directores</h1>

    @foreach ($directors as $director)
            <li>{{ $director }}</li>
    @endforeach
@endsection
