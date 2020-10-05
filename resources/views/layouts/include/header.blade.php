<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Описание">
    <meta name="potap" content="potap_Potapov">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-grid.css') }}" rel="stylesheet">
</head>
<body>
<header class="header">
    <div class="container">
        <div class="row header__block">
            <a href="/" class="header__logo">
                <img src="img/logo.svg" alt="Game Monster"/>
            </a>
            <div class="header__translate">
                <input id="en" type="radio" name="translate"/>
                <label for="en">En</label>
                <div class="header__inclined">/</div>
                <input id="ru" type="radio" name="translate" checked="checked"/>
                <label for="ru">Ru</label>
            </div>

            @if(count($basic['nav']))
                <ul class="header__list">
                    @foreach($basic['nav'] as $i=>$item)
                        @if($i === 0)
                            <li class="header__list-item">
                                <a class="header__list-link" href="#!">{{ $item->name }}
                                    <div class="header__list-arrow">
                                        <img src="img/arrow-down.svg" alt=""/>
                                    </div>
                                </a>
                            </li>
                        @elseif($i === 5 )
                            <li class="header__list-item">
                                <a class="header__list-link gradient__orange-yellow" href="#!">{{ $item->name }}</a>
                            </li>
                        @else
                            <li class="header__list-item">
                                <a class="header__list-link" href="#!">{{ $item->name }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif

            <div class="header__search">
                <input type="text" id="search"/>
                <label for="search">Поиск</label>
            </div>
            <div class="header__money">
                <input id="dollar" type="radio" name="money"/>
                <label for="dollar">$</label>
                <input id="euro" type="radio" name="money"/>
                <label for="euro">€</label>
                <input id="rub" type="radio" name="money" checked="checked"/>
                <label for="rub">₽</label>
            </div>
            <div class="header__auth">
                @guest
                    <a href="{{ route('login') }}" class="header__auth-item">Вход</a>
                    @if (Route::has('register'))
                        <div class="header__inclined">/</div>
                        <a class="header__auth-item" href="{{ route('register') }}">Регистрация</a>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                @endguest
            </div>
        </div>
    </div>
</header>