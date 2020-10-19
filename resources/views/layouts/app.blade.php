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
{{--    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/bootstrap-grid.scss') }}" rel="stylesheet">--}}
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

        @include('layouts.include.header')

        <main id="app">
            @yield('content')
        </main>

        @include('layouts.include.footer')



<script src="{{ asset('/assets/js/app.js') }}"></script>
<script src="{{ asset('/assets/js/scripts.js') }}"></script>


    <script>
        const showCarts = document.querySelectorAll('.showCart');
        const email = document.getElementById('formEmail');

        const modal = document.querySelector('.modal.modal-key');
        const modalWrap = modal.querySelector('.global-wrap')
        const modalTitle = modal.querySelector('#modalTitle');
        const modalEmail = modal.querySelector('#modalEmail');
        const modalKey = modal.querySelector('#modalKey');
        const close = modal.querySelector('.close')

        showCarts.forEach(cart => {
            cart.addEventListener('click', () =>
            {
                const key = cart.dataset.key;
                const title = cart.parentElement.querySelector('.catalog__title').textContent;


                modal.classList.add('d-block')

                modalTitle.textContent = title;
                modalEmail.value = email.value;
                modalKey.value = key;




                const btnsCash = modal.querySelectorAll('.getCash')
                btnsCash.forEach(cash =>{
                    cash.addEventListener('click', () => {
                        if (modal.classList.contains('d-block'))
                        {
                            const input = cash.parentElement.querySelector('input');
                            input.removeAttribute('disabled');

                            input.select();
                            document.execCommand("copy");

                            input.setAttribute('disabled', 'disabled');
                        }
                    })
                })


                window.addEventListener('click', (e) => {
                    if (e.target === modalWrap )
                    {
                        modal.classList.remove('d-block')
                    }
                })
                close.addEventListener('click', () => {
                    modal.classList.remove('d-block')
                })


            })
        })

    </script>
</body>
</html>