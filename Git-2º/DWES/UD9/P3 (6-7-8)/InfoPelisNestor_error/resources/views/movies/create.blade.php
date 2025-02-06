@extends('layout')

@section('content')
    <h1>Añadir película</h1>

    <form action="{{ route('movies.store') }}" method="POST">
        @csrf

        {{--TITLE--}}
        <div>
            <label for="title">Title: </label>
            <input type="text" name="title" id="title">
            @error('title')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <br>

        {{--DIRECTOR--}}
        <div>
            <label for="director">Director: </label>
            <input list="directors" name="director" id="director">
            <datalist id="directors">
                @foreach ($directors as $director)
                    <option value="{{ $director }}"></option>
                @endforeach
            </datalist>
        </div>
        <br>


        {{--BUDGET--}}
        <div>
            <label for="budget">Budget: </label>
            <input type="number" name="budget" id="budget">

        </div>
        <br>

        {{--HOMEPAGE--}}
        <div>
            <label for="homepage">Homepage:  </label>
            <input type="text" name="homepage" id="homepage">
            @error('homepage')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <br>

        {{--OVERVIEW--}}
        <div>
            <label for="overview">Overview: </label>
            <input type="text" name="overview" id="overview">
            @error('overview')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <br>

        {{--POPULARITY--}}
        <div>
            <label for="popularity">Popularity: </label>
            <input type="number" name="popularity" id="popularity">

        </div>
        <br>

        {{--RELEASE DATE--}}
        <div>
            <label for="release_date">Release Date: </label>
            <input type="text" name="release_date" id="release_date" value="{{ old('release_date') }}" placeholder="YYYY/mm/dd">
            @error('release_date')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <br>

        {{--REVENUE--}}
        <div>
            <label for="revenue">Revenue: </label>
            <input type="number" name="revenue" id="revenue">

        </div>
        <br>

        {{--RUNTIME--}}
        <div>
            <label for="runtime">Runtime: </label>
            <input type="number" name="runtime" id="runtime">

        </div>
        <br>

        {{--MOVIE STATUS--}}
        <div>
            <label for="movie_status">Movie Status: </label>
            <input type="text" name="movie_status" id="movie_status">

        </div>
        <br>

        {{--TAGLINE--}}
        <div>
            <label for="tagline">Tagline: </label>
            <input type="text" name="tagline" id="tagline">

        </div>
        <br>

        {{--VOTE AVERAGE--}}
        <div>
            <label for="vote_average">Vote Average: </label>
            <input type="number" name="vote_average" id="vote_average">
            @error('vote_average')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <br>

        {{--VOTE COUNT--}}
        <div>
            <label for="vote_count">Vote Count: </label>
            <input type="number" name="vote_count" id="vote_count">

        </div>
        <br>

        {{--IMAGE--}}
        <div>
            <label for="image">Imagen</label>
            <input type="file" name="image" id="image">

        </div>

        <button type="submit">Enviar</button>

    </form>
@endsection
