<div
    class="mt-8 mb-5 transform scale-100 hover:scale-110 hover:opacity-75 transition-transform ease-in-out duration-300">
    <a href="{{ route('movies.show', $movie['id']) }}">
        <div class="relative">
            <img class="rounded-lg" src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}"
                alt="because-this-is-my-first-life">
            <div
                class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity w-full h-full duration-150">
                <svg class="fill-current w-12 h-12 text-white absolute mx-auto" xmlns="http://www.w3.org/2000/svg"
                    height="1em" viewBox="0 0 384 512">
                    <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path
                        d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z" />
                </svg>
            </div>
        </div>
        <a href="#" class="sm:text-sm md:text-md lg:text-lg mt-2 hover:text-gray-300">{{ $movie['title'] }}</a>
        <div>
            <div class="flex items-center hover:text-gray-300 text-sm">
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
            </div>
            <div class="text-gray-400 text-sm">
                @foreach ($movie['genre_ids'] as $genre)
                    {{ $genres->get($genre) }}@if (!$loop->last)
                        ,
                    @endif
                @endforeach
            </div>
        </div>
    </a>
</div>
