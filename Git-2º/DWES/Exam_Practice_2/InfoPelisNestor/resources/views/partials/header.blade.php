{{-- Práctica 2 --}}
<header>
    <a href="{{ route('index') }}">
        <img src="{{ asset('img/infomovies.png') }}" alt="InfoPelis Logo" style="height:50px;">
    </a>
    <nav>
        {{-- Práctica 2
        <a href="{{ route('movie.list') }}">
            <img src="{{ asset('img/movies.png') }}" alt="Characters" style="height: 40px;">
        </a>
        --}}
        {{--Add film - Práctica 3 --}}
        <a href="{{ route('movies.create') }}">
            <img src="{{ asset('img/addFilm.png') }}" alt="Add Film" style="height:40px;">
        </a>

        {{--List of movies - Práctica 3 --}}
        <a href="{{ route('movies.index') }}">
            <img src="{{ asset('img/movies.png') }}" alt="Movies Logo" style="height:40px;">
        </a>

        {{--List of people (actors) - Práctica 3 --}}
        <a href="{{ route('actors.index') }}">
            <img src="{{ asset('img/people.png') }}" alt="Persons Logo" style="height:40px;">
        </a>

        {{--List of directors - Práctica 3 --}}
        <a href="{{ route('directors.index') }}">
            <img src="{{ asset('img/directors.png') }}" alt="Directors Logo" style="height:40px;">
        </a>

    </nav>
</header>
