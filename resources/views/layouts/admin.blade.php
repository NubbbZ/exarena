<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@hasSection('title') @yield('title') : @endif{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body>
        <header>
            @include('partials.header')
        </header>

        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block">
                    @include('partials.admin.sidebar')
                </nav>
                <main class="col-md-10">
                    @yield('content')
                </main>
            </div>
        </div>

        <!-- <main class="py-4">
            @yield('content')
        </main> -->

        <footer class="footer fixed-bottom">
            @include('partials.footer')
        </footer>
        @livewireScripts
    </body>
</html>
