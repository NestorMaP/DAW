<header>
    <a href="{{ route('index') }}">
        <img src="{{ asset('img/infomovies.png') }}" alt="InfoPelis Logo" style="height:50px;">
    </a>
    <nav>
        {{--Add film--}}
        <a href="{{ route('movies.create') }}">
            <img src="{{ asset('img/addFilm.png') }}" alt="Add Film" style="height:40px;">
        </a>

        {{--List of movies--}}
        <a href="{{ route('movies.index') }}">
            <img src="{{ asset('img/movies.png') }}" alt="Movies Logo" style="height:40px;">
        </a>

        {{--List of people (actors)--}}
        <a href="{{ route('actors.index') }}">
            <img src="{{ asset('img/people.png') }}" alt="Persons Logo" style="height:40px;">
        </a>

        {{--List of directors--}}
        <a href="{{ route('directors.index') }}">
            <img src="{{ asset('img/directors.png') }}" alt="Directors Logo" style="height:40px;">
        </a>
    </nav>
</header>
