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
                            <div class="swiper-wrapper cart-images__additional-image d-flex align-items-center">

                                @foreach($item->img as $img)
                                    <div class="cart-images__additem swiper-slide">
                                        <a href="#" class="d-block">
                                            <img class="mw-100" src="/storage/{{ $img }}" alt="main-image">
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>

                @elseif( !is_null($item->preloader) && $item->preloader )
                    <div class="cart-images col-12 col-xl-7 px-0">
                        <img src="/storage/{{ $item->preloader }}" alt="main-image" class="w-100">
                    </div>
                @else
                    <div class="cart-images col-12 col-xl-7 px-0">
                        <img src="/assets/static/img/main/no-image.png" alt="main-image" class="w-100">
                   </div>
                @endif

                <div class="cart-description-price col-12 col-xl-5 px-0 pl-xl-5">
                    @if($item->title)
                        <div class="right-wrap__title">
                            {{ json_decode($item->title, true)[session('locale')] ?? '' }}
                        </div>
                    @endif
                    <div class="right-wrap12 d-flex flex-column flex-sm-row flex-xl-column justify-content-between">
                        <div class="right-wrap1">

                            @if(count($item->category))
                                <div class="right-wrap__genre-button">
                                    @foreach($item->category as $category)
                                        <button class="right-wrap__genre mr-2">
                                            {{ json_decode($category->name, true)[session('locale')] }}
                                        </button>
                                    @endforeach
                                </div>
                            @endif

                            <div class="right-wrap__prices d-flex align-items-center">
                                <div class="right-wrap__actual">
                                    @if(!is_null($item->price) && $item->price)
                                        {{ json_decode($item->price, true)[session('currency')] }}
                                        <span class="current">
                                          {{ session('currencyIcon') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="right-wrap__irrelevant d-flex">
                                    @if(!is_null($item->old_price) && $item->old_price)
                                        {{ json_decode($item->old_price, true)[session('currency')] }}
                                        {{ session('currencyIcon') }}
                                    @endif
                                </div>
                            </div>
                            <div class="right-wrap__get-keys d-flex flex-column flex-md-row align-items-start mb-4">
                                @guest
                                    <a href="{{ route('login') }}"
                                       class="right-wrap__buy-key"
                                    >
                                        @lang('all/showCatalog.loginAccount')
                                    </a>
                                @else

                                    @if(count($item->key) && !is_null($item->key))
                                        <form action="{{ route('user.buyKey', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button
                                                    type="submit"
                                                    class="right-wrap__buy-key"
                                            >
                                                @lang('all/showCatalog.buyKey')
                                            </button>
                                        </form>
                                    @else
                                        <button class="right-wrap__buy-key">
                                            @lang('all/showCatalog.noKey')
                                        </button>
                                    @endif
                                        <a href="/development" class="right-wrap__random-key" style="cursor:pointer;">
                                            @lang('all/showCatalog.knockRandom')
                                        </a>
                                @endguest

                            </div>
                                @include('base.alert.success')
                                @include('base.alert.error')
                        </div>

                        <div class="right-wrap1">
                            <div class="right-wrap__lists d-flex">
                                <ul class="right-wrap__tag">


                                    @if($item->created_at)
                                        <li>
                                            @lang('all/showCatalog.data')
                                        </li>
                                    @endif
                                    @if(!is_null($item->developer) && $item->developer)
                                        <li>
                                            @lang('all/showCatalog.developer')
                                        </li>
                                    @endif
                                    @if(count($item->operatingSystem) && $item->operatingSystem)
                                        <li>
                                            @lang('all/showCatalog.operatingSystem')
                                        </li>
                                    @endif
                                    @if(count($item->languages) && $item->languages)
                                        <li>
                                            @lang('all/showCatalog.language')
                                        </li>
                                    @endif
                                </ul>
                                <ul class="right-wrap__value">

                                    @if($item->created_at)
                                        <li>
                                            {{ $item->created_at->format('d m Y') }}
                                        </li>
                                    @endif
                                    @if(!is_null($item->developer) && $item->developer)
                                        <li>
                                            <span class="cart-images__yellow">
                                                {{ $item->developer->name }}
                                            </span>
                                        </li>
                                    @endif

                                    @if(count($item->operatingSystem) && $item->operatingSystem)
                                        <li class="d-flex">
                                            @foreach($item->operatingSystem as $system)
                                                <span class="cart-images__yellow">
                                                    {{ $system->name }}<span class="cart-images__white"> /  </span>
                                                </span>
                                            @endforeach
                                        </li>
                                    @endif

                                    @if(count($item->languages) && $item->languages)
                                        <li>
                                            @foreach($item->languages as $lang)
                                                <span class="cart-images__lang">
                                                    {{ $lang->name }} <br>
                                                </span>
                                            @endforeach
                                        </li>
                                    @endisset

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row px-0 m-0 d-flex w-100 d-flex justify-content-end">

            @if(!is_null($item->text) && $item->text)
                    <div class="game-description col-12 col-xl-7 px-0 mb-3 mb-md-5 mb-xl-0" id="showDescription">
                            {!! json_decode($item->text, true)[session('locale')] !!}
    {{--                        {!! Str::limit($item->text, 500) !!}--}}
                    </div>
                @endif

                <div class="originacc col-12 col-xl-5 px-0">
                    <div class="originacc-wrap ml-xl-5">
                        <div class="originacc-wrap__hd d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img class="mr-3" src="/assets/static/img/main/icon/origin.png" alt="">
                                <div class="originacc-wrap__title">Origin аккаунт 3 игры</div>
                            </div>
                            <div class="originacc-wrap__price"><span>179 </span>₽</div>
                        </div>
                        <div class="originacc-wrap__games d-flex flex-column flex-md-row justify-content-between">
                            <ul class="originacc-wrap__games-list">
                                <li><button class="originacc-wrap__button">Witcher 3: Wild Hunt</button></li>
                                <li><button class="originacc-wrap__button active">Overwatch Delux Edition</button></li>
                                <li><button class="originacc-wrap__button">Cyberpunk 2077</button></li>
                            </ul>
                            <div class="originacc-wrap__price1"><span style="color:#fff">179</span>₽</div>

                            <div class="originacc-wrap__rent d-flex align-items-end">
                                <a href="/development" class="originacc-wrap__rent-acc" >
                                    @lang('all/showCatalog.rentAccount')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

{{--@dd($otherGame)--}}

    @if(!is_null($otherGame) && $otherGame && count($otherGame))
        <section class="d-none d-sm-block">
            <div class="container">
                <div class="section__text news__text d-flex justify-content-between justify-content-lg-start d-block">
                    <h3 class="section__title news__title">
                        @lang('all/showCatalog.similarGames')
                    </h3>
                    <p class="section__subtitle">
                        @lang('all/showCatalog.allGames')
                    </p>
                </div>
                <div class="row">

                    @foreach($otherGame as $wrapper)
                        @foreach($wrapper->catalog as $item)
                            @include('base.include.catalogItem', ['item' => $item, 'show' => false])
                        @endforeach
                    @endforeach

                </div>
            </div>
        </section>
    @endif

@endsection