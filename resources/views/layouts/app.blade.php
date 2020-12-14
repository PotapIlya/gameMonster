<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="description">
    <meta name="gameMonster" content="gameMonster">
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>
        @if(Request::path() === '/')
            GAME MONSTER - №1 Best for Gamer! Marketplace and Game Community
        @else
            {{ config('app.name', 'Laravel') }}
        @endif
    </title>

    <link rel="icon" href="/assets/static/img/main/iconHead.png" sizes="16x16">

    <link href="{{ asset('/assets/css/modules.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/app.css') }}" rel="stylesheet">

    @yield('header')

</head>
<body>
    <div id="app">
        @include('layouts.include.header')

        <main>
            @yield('content')
        </main>

        @includeWhen(Auth::check(), 'base.modal.myAddBalance')
        @include('base.modal.modalBonus', ['items' => $basic['socialNetworks']])

        @include('layouts.include.footer')


    </div>

    {{--    SWIPER  --}}
    <script src="{{ asset('/assets/js/swiper-bundle.min.js') }}"></script>

    {{--  VUE  --}}
    <script src="{{ asset('/assets/js/app.js') }}"></script>

    {{--  CUSTOM SCRIPTS  --}}
    <script src="{{ asset('/assets/js/scripts.js') }}"></script>


    @yield('footer')


</body>
</html>