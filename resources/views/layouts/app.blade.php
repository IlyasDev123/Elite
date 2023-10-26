<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Elt Punch') }}</title>

    @yield('styles')
    @include('layouts.style')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="main__wrapper">

        <aside class="side__bar">
            <div class="site__logo">
                <img src="{{ asset('images/logo.png') }}" alt="logo">
            </div>

            @include('layouts.sidebar')

        </aside>

        <div class="main__body">

            @include('layouts.header')

            <main>
                <section class="main__section">
                    @yield('content')
                </section>
            </main>

        </div>

    </div>
    @include('layouts.script')
</body>

</html>
