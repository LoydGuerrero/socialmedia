<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Tailwind CSS -->
    <link href="{{ asset('dist/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div id="app">
        <nav class="bg-white shadow-md">
            <div class="container mx-auto px-4 py-2 flex justify-between items-center">
                <a class="text-xl font-semibold" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <div class="flex items-center">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <a class="text-gray-600 hover:text-gray-800 mr-4" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif

                        @if (Route::has('register'))
                            <a class="text-gray-600 hover:text-gray-800" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @endguest
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
