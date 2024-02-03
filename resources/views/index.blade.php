@extends('layout.template')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        {{-- Start Popular Movies --}}
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-red-500 text-lg font-semibold">Popular Movies</h2>
            <div class="grid grid-cols-3 gap-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 lg:gap-8">
                @foreach ($popularMovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres" />
                @endforeach
            </div>
        </div>
        {{-- End Popular Movies --}}

        {{-- Start Now Playing Movies --}}
        <div class="now-playing-movies py-24">
            <h2 class="uppercase tracking-wider text-red-500 text-lg font-semibold">Now Playing
                Movies</h2>
            <div class="grid grid-cols-3 gap-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 lg:gap-8">
                @foreach ($nowPlayingMovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres" />
                @endforeach
            </div>
        </div>
        {{-- End Now Playing Movies --}}
    </div>
@endsection
