@extends('layouts.app')


@section('content')

{{--@dd($item)--}}

        <section class="cart d-flex justify-content-center">
            <div class="container row  mx-0">
                <div class="row1 row px-0 m-0 mb-md-2">
                    @if(count($item->img))
                        <div class="cart-images col-12 col-xl-7 px-0 mb-5 ">
                            <div class="cart-images__main-image">
                                <a href="#">
                                    <img src="/storage/{{ $item->preloader }}" alt="main-image" class="mw-100">
                                </a>
                            </div>
                            <div class="cart-images__additional-image d-flex justify-content-between">
                                <div class="cart-images__additem col-xl-2">
                                    <a href="#" class="d-block">
                                        <img class="mw-100" src="/assets/release/img/card-image.jpg" alt="main-image">
                                    </a>
                                </div>
                                <div class="cart-images__additem col-xl-2">
                                    <a href="#" class="d-block">
                                        <img class="mw-100" src="/assets/release/img/card-image.jpg" alt="main-image">
                                    </a>
                                </div>
                                <div class="cart-images__additem col-xl-2">
                                    <a href="#" class="d-block">
                                        <img class="mw-100" src="/assets/release/img/card-image.jpg" alt="main-image">
                                    </a>
                                </div>
                                <div class="cart-images__additem col-xl-2">
                                    <a href="#" class="d-block">
                                        <img class="mw-100" src="/assets/release/img/card-image.jpg" alt="main-image">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @elseif($item->preloader)
                        <div class="cart-images col-12 col-xl-7 px-0 mb-5 ">
                            <div class="cart-images__main-image">
                                <a href="#">
                                    <img src="/storage/{{ $item->preloader }}" alt="main-image" class="mw-100">
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="cart-images col-12 col-xl-7 px-0 mb-5 ">
                            <div class="cart-images__main-image">
                                <a href="#">
                                    <img src="/static/img/no-image.png" alt="main-image" class="mw-100">
                                </a>
                            </div>
                        </div>
                    @endif

                    <div class="cart-description-price col-12 col-xl-5 px-0 pl-xl-5">
                        <div class="right-wrap__title">
                            {{ $item->title }}
                        </div>
                        <div class="right-wrap12 d-flex flex-column flex-sm-row flex-xl-column justify-content-between">
                            <div class="right-wrap1">
                                <div class="right-wrap__genre-button">
                                    <button class="right-wrap__genre">RPG</button>
                                    <button class="right-wrap__genre">Экшен</button>
                                    <button class="right-wrap__genre">Приключения</button>
                                </div>
                                <div class="right-wrap__prices d-flex align-items-center">
                                    <div class="right-wrap__actual">
                                        {{ $item->price }} ₽
                                    </div>
                                    <div class="right-wrap__irrelevant d-flex">
                                        {{ $item->old_price }} ₽
                                    </div>
                                </div>
                                <div class="right-wrap__get-keys d-flex flex-column flex-md-row align-items-start">
                                    <button class="right-wrap__buy-key">Купить ключ</button>
                                    <button class="right-wrap__random-key">Выбить в рандоме</button>
                                </div>
                            </div>


                            <div class="right-wrap1">
                                <div class="right-wrap__lists d-flex">
                                    <ul class="right-wrap__tag">
                                        <li>Дата выпуска</li>
                                        <li>Разработчик</li>
                                        <li>ОС</li>
                                        <li>Язык</li>
                                    </ul>
                                    <ul class="right-wrap__value">
                                        <li>12 августа 2012</li>
                                        <li><span class="cart-images__yellow">Valve</span></li>
                                        <li><span class="cart-images__yellow">Windows</span> / <span class="cart-images__yellow">Mac</span></li>
                                        <li>русский<br>английский</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row2 w-100 row px-0 m-0 d-flex">
                    <div class="game-description col-12 col-xl-7 px-0 mb-3 mb-md-5 mb-xl-0">
                       {!! $item->text !!}
                    </div>
                    <div class="originacc col-12 col-xl-5 px-0">
                        <div class="originacc-wrap ml-xl-5">
                            <div class="originacc-wrap__hd d-flex justify-content-between">
                                <div class="originacc-wrap__title">Origin аккаунт 3 игры</div>
                                <div class="originacc-wrap__price"><span style="color:#fff">179</span>₽</div>
                            </div>
                            <div class="originacc-wrap__games d-flex flex-column flex-md-row justify-content-between">
                                <ul class="originacc-wrap__games-list">
                                    <li><button class="originacc-wrap__button">Witcher 3: Wild Hunt</button></li>
                                    <li><button class="originacc-wrap__button">Overwatch Delux Edition</button></li>
                                    <li><button class="originacc-wrap__button">Cyberpunk 2077</button></li>
                                </ul>
                                <div class="originacc-wrap__price1"><span style="color:#fff">179</span>₽</div>
                                <div class="originacc-wrap__rent d-flex align-items-end">
                                    <a href="#" class="originacc-wrap__rent-acc">Aрендовать аккаунт</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


{{--        <section>--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--					<?--}}
{{--					include 'template/__item.php'--}}
{{--					?>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}






@endsection