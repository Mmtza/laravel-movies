@extends('layout.template')

@section('content')
    {{-- Movie Info --}}
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="poster" class="md:w-80 lg:w-96">
            <div class="lg:ml-16 md:ml-2">
                <div class="text-4xl font-semibold">{{ $movie['title'] }}
                    ({{ \Carbon\Carbon::parse($movie['release_date'])->format('Y') }})</div>
                <div class="flex items-center hover:text-gray-300 text-sm mt-2">
                    <span class="">
                        <svg class="fill-current text-orange-500 w-4" xmlns="http://www.w3.org/2000/svg" height="1em"
                            viewBox="0 0 576 512">
                            <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                        </svg>
                    </span>
                    <span class="ml-1">{{ $movie['vote_average'] }}</span>
                    <span class="mx-2 mb-1">|</span>
                    <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                    <span class="mx-2 mb-1">|</span>
                    <span class="mx-2 mb-1">
                        @foreach ($movie['genres'] as $genre)
                            {{ $genre['name'] }}@if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </span>
                </div>

                {{-- Detail Movie --}}
                <p class="text-gray-300 mt-8">{{ $movie['overview'] }}</p>

                {{-- Featured Cast --}}
                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        @foreach ($movie['credits']['crew'] as $crew)
                            @if ($loop->index < 2)
                                <div class="mr-8">
                                    <div>{{ $crew['name'] }}</div>
                                    <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                                </div>
                            @endif
                        @endforeach


                    </div>
                </div>

                @if (count($movie['videos']['results']) > 0)
                    {{-- Play Trailer --}}
                    <div class="mt-12">
                        <a href="https://youtube.com/watch?v={{ $movie['videos']['results']['0']['key'] }}" target="__blank"
                            class="inline-flex items-center bg-blue-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-blue-600 transition ease-in-out duration-300">
                            <svg class="fill-current text-white mr-2" xmlns="http://www.w3.org/2000/svg" height="1em"
                                viewBox="0 0 512 512">
                                <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c7.6-4.2 16.8-4.1 24.3 .5l144 88c7.1 4.4 11.5 12.1 11.5 20.5s-4.4 16.1-11.5 20.5l-144 88c-7.4 4.5-16.7 4.7-24.3 .5s-12.3-12.2-12.3-20.9V168c0-8.7 4.7-16.7 12.3-20.9z" />
                            </svg>
                            <p class="text-white">
                                Play Trailer
                            </p>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{-- Movie Info End --}}

    {{-- Movie Cast --}}
    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <div class="text-4xl font-semibold">Cast</div>
            <div class="grid grid-cols-3 gap-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 lg:gap-8">
                @foreach ($movie['credits']['cast'] as $cast)
                    @if ($loop->index < 5)
                        <div class="mt-8 mb-5 transform hover:opacity-75 transition-transform ease-in-out duration-300">
                            <a href="#">
                                <div class="relative">
                                    <img class="rounded-lg"
                                        src="{{ 'https://image.tmdb.org/t/p/w300/' . $cast['profile_path'] }}"
                                        alt="profile">
                                </div>
                                <a href="#"
                                    class="sm:text-sm md:text-md lg:text-lg mt-2 hover:text-gray-300">{{ $cast['original_name'] }}</a>
                                <div class="flex items-center hover:text-gray-300 text-sm">
                                    <span>{{ $cast['character'] }}</span>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    {{-- Movie Cast End --}}

    {{-- Movie Images --}}
    <div class="movie-images border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <div class="text-4xl font-semibold">Images</div>
            <div class="grid grid-cols-3 gap-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3">
                @foreach ($movie['images']['backdrops'] as $images)
                    @if ($loop->index < 9)
                        <div class="mt-8 transform hover:opacity-75 transition-transform ease-in-out duration-300">
                            <a href="#">
                                <div class="relative">
                                    <img class="rounded-lg"
                                        src="{{ 'https://image.tmdb.org/t/p/w300/' . $images['file_path'] }}"
                                        alt="backdrops">
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    {{-- Movie Images End --}}
@endsection
