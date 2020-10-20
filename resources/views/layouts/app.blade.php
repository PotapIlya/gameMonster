<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="description">
    <meta name="gameMonster" content="gameMonster">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('/assets/css/modules.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('/assets/js/header.js') }}"></script>



    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

</head>
<body>




    {{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
    {{--            <div class="container">--}}
    {{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
    {{--                    {{ config('app.name', 'Laravel') }}--}}
    {{--                </a>--}}
    {{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
    {{--                    <span class="navbar-toggler-icon"></span>--}}
    {{--                </button>--}}

    {{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
    {{--                    <!-- Left Side Of Navbar -->--}}
    {{--                    <ul class="navbar-nav mr-auto">--}}

    {{--                    </ul>--}}

    {{--                    <!-- Right Side Of Navbar -->--}}
    {{--                    <ul class="navbar-nav ml-auto">--}}
    {{--                        <!-- Authentication Links -->--}}
    {{--                        @guest--}}
    {{--                            <li class="nav-item">--}}
    {{--                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
    {{--                            </li>--}}
    {{--                            @if (Route::has('register'))--}}
    {{--                                <li class="nav-item">--}}
    {{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
    {{--                                </li>--}}
    {{--                            @endif--}}
    {{--                        @else--}}
    {{--                            <li class="nav-item dropdown">--}}
    {{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
    {{--                                    {{ Auth::user()->name }}--}}
    {{--                                </a>--}}

    {{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
    {{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
    {{--                                       onclick="event.preventDefault();--}}
    {{--                                                     document.getElementById('logout-form').submit();">--}}
    {{--                                        {{ __('Logout') }}--}}
    {{--                                    </a>--}}

    {{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
    {{--                                        @csrf--}}
    {{--                                    </form>--}}
    {{--                                </div>--}}
    {{--                            </li>--}}
    {{--                        @endguest--}}
    {{--                    </ul>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </nav>--}}


    <div id="app">
        @include('layouts.include.header')

        <main>
            @yield('content')
        </main>

        @include('layouts.include.footer')

    </div>


<script src="{{ asset('/assets/js/app.js') }}"></script>
<script src="{{ asset('/assets/js/scripts.js') }}"></script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        if (document.querySelector('.swiper-top')){

            const galleryThumbs = new Swiper('.swiper-thumbs', {
                spaceBetween: 15,
                slidesPerView: 6,
                loop: true,
                centeredSlides: true,
                slidesPerGroup: 1,
                loopedSlides: 5,
            });
            const galleryTop = new Swiper('.swiper-top', {
                slidesPerView: 1,
                spaceBetween: 10,
                loopedSlides: 5,
                loop:true,
                thumbs: {
                    swiper: galleryThumbs,
                },
            });
            galleryTop.update();
            galleryThumbs.update();
        }

        if (document.querySelector('.swiper-home')){
            // console.log(window.innerWidth)
            if (window.innerWidth > 992){
                document.querySelector('.swiper-home_pagination').remove()
                const homeThumbs = new Swiper('.swiper-home_thumbs', {
                    spaceBetween: 15,
                    slidesPerView: 5,
                    loop: true,
                    centeredSlides: true,
                    slidesPerGroup: 1,
                    loopedSlides: 5,

                });
                const homeTop = new Swiper('.swiper-home', {
                    slidesPerView: 1,
                    spaceBetween: 10,
                    loopedSlides: 5,
                    loop:true,
                    thumbs: {
                        swiper: homeThumbs,
                    },
                });
                homeTop.update();
                homeThumbs.update();
            }else{
                document.querySelector('.swiper-home_thumbs').remove()
                const homeTop = new Swiper('.swiper-home', {
                    slidesPerView: 1,
                    spaceBetween: 10,
                    loopedSlides: 5,
                    loop:true,
                    pagination: {
                        el: '.swiper-home_pagination',
                        type: 'bullets',
                    },
                });
                homeTop.update();
            }
        }

    </script>


</body>
</html>