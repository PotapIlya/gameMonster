
<header class="header">
    <div class="container px-2 px-xl-0">
        <div class="d-flex align-items-center justify-content-between header__block">


            <div class="d-flex align-items-center mr-0 mr-sm-5">
                <div class="mobile_menu d-xl-none mr-0 mr-sm-1">
                    <div>
                        <span class="d-flex nav-item"></span>
                    </div>

                </div>
                <a href="/" class="header__logo">
                    <img class="" src="/assets/static/oldImage/assets/release/img/logo.svg" alt="Game Monster"/>
                </a>
            </div>
            <div class="d-xl-flex flex-row flex-wrap flex-xl-nowrap flex-column flex-xl-row align-items-center justify-content-between w-100 mobile_menu-form">
                <div class="header__translate order-5 order-xl-0 justify-content-end justify-content-sm-start">
                    <input id="en" type="radio" name="translate"/>
                    <label for="en">En</label>
                    <div class="header__inclined">/</div>
                    <input id="ru" type="radio" name="translate" checked="checked"/>
                    <label for="ru" class="activeText">Ru</label>
                </div>


                @if(count($basic['nav']))
                    <ul class="header__list d-flex align-items-start align-items-xl-center flex-column flex-xl-row order-2 order-xl-0 mr-0 mr-xl-5">
                        @foreach($basic['nav'] as $index=>$nav)
                            @if($index === 0)
                                <li class="header__list-item">
                                    <a class="header__list-link" href="{{ $nav->url }}">
                                        {{ $nav->name }}
                                        <div class="header__list-arrow">
                                            <img src="/assets/static/img/header/arrow-down.svg" alt=""/>
                                        </div>
                                    </a>
                                </li>
                            @elseif($index+1 === count($basic['nav']))
                                <li class="header__list-item">
                                    <a class="header__list-link gradient__orange-yellow" href="{{ $nav->url }}">{{ $nav->name }}</a>
                                </li>
                            @else
                                <li class="header__list-item">
                                    <a class="header__list-link" href="{{ $nav->url }}">{{ $nav->name }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif

                <div class="header__search order-1 order-xl-0 mb-3 mb-xl-0 mb-2 mb-xl-0">
                    <search-component
                            :search="{{ json_encode($basic['search']) }}"
                    />
                </div>

                <div class="header__money order-4 order-xl-0 flex-column mb-2 mb-xl-0">
                    <div class="header__increase-balance d-none d-sm-block d-xl-none">
                        <a href="#" class="mb-2">Пополнить баланс</a>
                    </div>
                    <div class="header__money-currency d-flex align-items-center justify-content-end justify-content-sm-start  pt-3 pt-sm-0">
                        <input id="dollar" type="radio" name="money"/>
                        <label for="dollar">$</label>
                        <input id="euro" type="radio" name="money"/>
                        <label for="euro">€</label>
                        <input id="rub" type="radio" name="money" checked="checked"/>
                        <label for="rub" class="activeText">₽</label>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-end col-4 col-md-3 col-xl-2 px-0">

                @guest
                    @if(Request::path() !== 'login' && Request::path() !== 'register')
                        <modal-auth-component />
                    @endif
                @else
                    <div class="header__user d-flex align-items-center">
                        <span class="mr-3 header__user-money">{{ \Auth::user()->about->money }} ₽</span>
                        <div class="d-flex align-items-center">
                            <div>

                                @if(!is_null(\Auth::user()->img))
                                    <img class="mw-100" src="{{ \Auth::user()->img }}" alt="">
                                @else
                                    <img class="mw-100" src="/assets/static/img/my/avatar.png" alt="">
                                @endif
{{--                                <img class="mw-100" src="/assets/static/img/my/avatar.png" alt="">--}}
                            </div>
                            <div class="header__list-arrow d-none d-sm-block">
                                <img src="/assets/static/img/header/arrow-down.svg" alt=""/>
                            </div>
                        </div>

                        <ul class="header__user-menu">
                            <li>
                                <a href="{{ route('user.balance.index') }}">
                                    Пополнить баланс
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.index') }}">
                                    Личный кабинет
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"
                                >
                                    Выйти
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </div>

                @endguest
            </div>




        </div>
    </div>
</header>