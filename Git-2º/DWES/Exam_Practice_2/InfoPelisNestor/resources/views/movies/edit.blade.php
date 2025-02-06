{{-- Práctica 3 --}}
@extends('layout')

@section('content')
    @if (!auth()->check() || auth()->user()->rol !== 'admin')
        <div>
            <h2>No estás autorizado para crear películas. Inicia sesión con una cuenta con privilegios.</h2>
            <p><a href="{{ route('loginForm') }}">Iniciar sesión.</a></p>
            <p><a href="{{ route('signupForm') }}">Regístrate.</a></p>
        </div>
    @else

    <h1>Editar película {{ $movie->title }} </h1>

    {{-- Práctica 7.1 --}}
    {{-- Errores Práctica 7.3 --}}
    <form action="{{ route('movies.update', $movie->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{--TITLE--}}
        <div>
            <label for="title">Title: </label>
            <input type="text" name="title" id="title" value="{{ old('title', $movie->title) }}">
            @error('title')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <br>

        {{--BUDGET--}}
        <div>
            <label for="budget">Budget: </label>
            <input type="number" name="budget" id="budget" value="{{ old('budget', $movie->budget) }}">

        </div>
        <br>

        {{--HOMEPAGE--}}
        <div>
            <label for="homepage">Homepage:  </label>
            <input type="text" name="homepage" id="homepage" value="{{ old('homepage', $movie->homepage) }}">
            @error('homepage')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <br>

        {{--OVERVIEW--}}
        <div>
            <label for="overview">Overview: </label>
            <input type="text" name="overview" id="overview" value="{{ old('overview', $movie->overview) }}">
            @error('overview')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <br>

        {{--POPULARITY--}}
        <div>
            <label for="popularity">Popularity: </label>
            <input type="number" name="popularity" id="popularity" value="{{ old('popularity', $movie->popularity) }}">

        </div>
        <br>

        {{--RELEASE DATE--}}
        <div>
            <label for="release_date">Release Date: </label>
            <input type="text" name="release_date" id="release_date" value="{{ old('release_date', $movie->release_date) }}" placeholder="YYYY/mm/dd">
            @error('release_date')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <br>

        {{--REVENUE--}}
        <div>
            <label for="revenue">Revenue: </label>
            <input type="number" name="revenue" id="revenue" value="{{ old('revenue', $movie->revenue) }}">

        </div>
        <br>

        {{--RUNTIME--}}
        <div>
            <label for="runtime">Runtime: </label>
            <input type="number" name="runtime" id="runtime" value="{{ old('runtime', $movie->runtime) }}">

        </div>
        <br>

        {{--MOVIE STATUS--}}
        <div>
            <label for="movie_status">Movie Status: </label>
            <input type="text" name="movie_status" id="movie_status" value="{{ old('movie_status', $movie->movie_status) }}">

        </div>
        <br>

        {{--TAGLINE--}}
        <div>
            <label for="tagline">Tagline: </label>
            <input type="text" name="tagline" id="tagline" value="{{ old('tagline', $movie->tagline) }}">

        </div>
        <br>

        {{--VOTE AVERAGE--}}
        <div>
            <label for="vote_average">Vote Average: </label>
            <input type="number" name="vote_average" id="vote_average" value="{{ old('vote_average', $movie->vote_average) }}">
            @error('vote_average')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <br>

        {{--VOTE COUNT--}}
        <div>
            <label for="vote_count">Vote Count: </label>
            <input type="number" name="vote_count" id="vote_count" value="{{ old('vote_count', $movie->vote_count) }}">

        </div>
        <br>

        {{--IMAGE--}}
        <div>
            <label for="image">Current Picture</label>
            @if ($movie->image)
                <img src="{{ $movie->image_url }}" alt="Imagen de {{ $movie->title }}" width="150">
            @else
                <p>There is no picture</p>
            @endif
        </div>

        <div>
            <label for="image">Nueva Imagen</label>
            <input type="file" name="image" id="image">
            @error('image')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Enviar</button>

    </form>
    @endif
@endsection
