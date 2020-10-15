@extends('layouts.app')


@section('content')

{{--    @dd($item->img)--}}

    <section class="cart d-flex justify-content-center">
        <div class="container row  mx-0">
            <div class="row px-0 m-0 mb-md-5 w-100">

                @if( count($item->img) && !is_null($item->img) && $item->img )

                    <div class="cart-images col-12 col-xl-7 px-0">

                        <div class="swiper-container swiper-top">
                            <div class="swiper-wrapper">

                                @foreach($item->img as $img)
                                    <div class="cart-images__main-image swiper-slide">
                                        <img src="/storage/{{ $img }}" alt="main-image" class="mw-100">
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="swiper-container swiper-thumbs">
                            <div class="swiper-wrapper cart-images__additional-image">

                                @foreach($item->img as $img)
                                    <div class="cart-images__additem swiper-slide">
                                        <a href="#" style="block">
                                            <img class="mw-100" src="/storage/{{ $img }}" alt="main-image">
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>

                @elseif( !is_null($item->preloader) && $item->preloader )
                    <div class="cart-images col-12 col-xl-7 px-0">
                        <img src="/storage/{{ $item->preloader }}" alt="main-image" class="mw-100">
                    </div>
                @else
                    <div class="cart-images col-12 col-xl-7 px-0">
                        <img src="/assets/static/img/main/no-image.png" alt="main-image" class="w-100">
                   </div>
                @endif




                <div class="cart-description-price col-12 col-xl-5 px-0 pl-xl-5">
                    <div class="right-wrap__title">
                        {{ $item->title ?? '' }}
                    </div>
                    <div class="right-wrap12 d-flex flex-column flex-sm-row flex-xl-column justify-content-between">
                        <div class="right-wrap1">
                            @if(count($item->category))
                                <div class="right-wrap__genre-button">
                                    @foreach($item->category as $category)
                                        <button class="right-wrap__genre mr-2">
                                            {{ $category->name }}
                                        </button>
                                    @endforeach
                                </div>
                            @endif

                            <div class="right-wrap__prices d-flex align-items-center">
                                <div class="right-wrap__actual">
                                    @if($item->price)
                                        {{ $item->price }} <span class="current">₽</span>
                                    @endif
                                </div>
                                <div class="right-wrap__irrelevant d-flex">
                                    @if($item->old_price)
                                        {{ $item->old_price }} ₽
                                    @endif
                                </div>
                            </div>
                            <div class="right-wrap__get-keys d-flex flex-column flex-md-row align-items-start mb-4">
                                <button class="right-wrap__buy-key" style="cursor:pointer;">Купить ключ</button>
                                <button class="right-wrap__random-key" style="cursor:pointer;">Выбить в рандоме</button>
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
                                    <li class="d-flex flex-column mt-1">
                                        <span class="right-wrap__value-leng">русский</span>
                                        <span>английский</span>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row2 row px-0 m-0 d-flex w-100">
                <div class="game-description col-12 col-xl-7 px-0 mb-3 mb-md-5 mb-xl-0">
                    <p>
                        {!! Str::limit($item->text, 500) !!}
                        <a href="#" style="color:#F59502; text-decoration:none;">подробнее..</a>
                    </p>
                </div>


                <div class="originacc col-12 col-xl-5 px-0">
                    <div class="originacc-wrap ml-xl-5">
                        <div class="originacc-wrap__hd d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img class="mr-3" src="/assets/release/img/origin.png" alt="">
                                <div class="originacc-wrap__title">Origin аккаунт 3 игры</div>
                            </div>
                            <div class="originacc-wrap__price"><span style="color:#fff">179 </span>₽</div>
                        </div>
                        <div class="originacc-wrap__games d-flex flex-column flex-md-row justify-content-between">
                            <ul class="originacc-wrap__games-list">
                                <li><button class="originacc-wrap__button">Witcher 3: Wild Hunt</button></li>
                                <li><button class="originacc-wrap__button active">Overwatch Delux Edition</button></li>
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

    @if(count($otherGame))
        <section class="d-none d-sm-block">
            <div class="container">
                <div class="section__text news__text d-flex justify-content-between justify-content-lg-start d-block">
                    <h3 class="section__title news__title">Похожие игры</h3>
                    <p class="section__subtitle">Все игры</p>
                </div>
                <div class="row">

                    @foreach($otherGame as $item)
                        @include('base.include.catalogItem', ['item' => $item])
                    @endforeach

                </div>
            </div>
        </section>
    @endif

@endsection