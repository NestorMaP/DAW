{{-- Práctica 2 --}}
@extends('layout')

@section('content')
    <h1>Bienvenido a InfoPelis</h1>
    <p><a href="{{ route('loginForm') }}">
        @if(auth()->check())
            Mi perfil
        @else
            Iniciar sesión
        @endif
    </a></p>
    <p><a href="{{ route('signupForm') }}">Regístrate</a></p>
    <img src="{{ asset('img/welcome.png') }}" alt="Movies" style="max-width:50%; height:auto;">
    <p>Pasa a disfrutar del universo cinéfilo de primera mano</p>
@endsection
