<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite('resources/css/app.css')

    @livewireStyles
</head>

<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <img src="{{ asset('/img/logo/png/logo-no-background.png') }}" alt="" class="w-20">
                </li>
                <li class="md:ml-10 mt-3 md:mt-0 lg:mt-0">
                    <a href="{{ route('movies.index') }}" class="hover:text-gray-300 sm:text-sm">Movies</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0 lg:mt-0">
                    <a href="#" class="hover:text-gray-300 sm:text-sm">Tv Shows</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0 lg:mt-0">
                    <a href="#" class="hover:text-gray-300 sm:text-sm">Actors</a>
                </li>
            </ul>
            <div class="flex items-center mt-3 lg:mt-1 md:mt-1">
                {{-- Search --}}
                <livewire:search-dropdown>
            </div>
        </div>
    </nav>
    @yield('content')
    @livewireScripts
</body>

</html>
