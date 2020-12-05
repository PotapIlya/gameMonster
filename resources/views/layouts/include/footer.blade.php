<footer class="footer">
    <div class="footer__container mx-auto">
        <div class="footer__row">

            <div class="footer__element1 element1 unit">
                <img src="/assets/static/img/main/logo.svg" alt="Game Monster"/>
            </div>

            @if($basic['nav'])

                <ul class="footer__element2 element2 unit">

                    @foreach($basic['nav'] as $index=>$li)

                        @if($index+1 !== count($basic['nav']))
                            <li class="footer__item"><a class="footer__link" href="{{ $li->url }}">{{ $li->name }}</a></li>
                        @endif


                    @endforeach
                </ul>

            @endif
            <ul class="footer__element3 element3 unit">
                <li class="footer__item"><a class="footer__link" href="#!">Steam</a></li>
                <li class="footer__item"><a class="footer__link" href="#!">Origin</a></li>
                <li class="footer__item"><a class="footer__link" href="#!">Uplay</a></li>
                <li class="footer__item"><a class="footer__link" href="#!">Epic Games</a></li>
                <li class="footer__item"><a class="footer__link" href="#!">Playstation</a></li>
                <li class="footer__item"><a class="footer__link" href="#!">Xbox</a></li>
                <li class="footer__item"><a class="footer__link" href="#!">Mobile</a></li>
            </ul>
            <ul class="footer__element4 element4 unit ">
                <li class="footer__item"><a class="footer__link" href="#!">Become a partner</a></li>
                <li class="footer__item"><a class="footer__link" href="#!">Wholesale purchase</a></li>
                <li class="footer__item"><a class="footer__link" href="#!">Licensed<br> announcement</a></li>
            </ul>


            <div class="footer__element5 element5 unit">
                <div class="footer__item-second">
                    <a class="gradient__orange-yellow" href="#!">
                        Account rental
                    </a>
                </div>
                <div class="footer__item-second">
                    <a class="blue" href="mailto:support@gamemonster.store">
                        support@gamemonster.store
                    </a>
                </div>
                <div class="footer__icons-block footer__item-second">
                    <div class="d-flex align-items-center mb-3">
                        <img class="mr-2" src="/assets/static/img/pay/webmoney.png" alt="Webmoney"/>
                        <img class="mr-2" src="/assets/static/img/pay/p.png" alt="P"/>
                        <img class="mr-2" src="/assets/static/img/pay/visa.png" alt="Visa"/>
                        <img class="mr-2" src="/assets/static/img/pay/oval.png" alt=""/>
                    </div>
                    <div class="footer__icons">
                        <img class="mr-2" src="/assets/static/img/pay/gpay.png" alt="G Pay"/>
                        <img class="mr-2" src="/assets/static/img/pay/iphonepay.png" alt="Iphone Pay"/>
                        <img class="mr-2" src="/assets/static/img/pay/payeer.png" alt="Payeer"/>
                    </div>
                </div>
                <div class="footer__copy" style="color: #777777;">© 2020</div>
            </div>


            <ul class="footer__element6 element6 unit" style="color: #fff;">
                @guest
                    <li class="footer__auth mb-4">

                        @if(Request::path() !== 'login' && Request::path() !== 'register' && Request::path() !== 'password/reset')
                            <footer-modal-auth-component />
                        @endif

                    </li>
                @endguest
                <li class="footer__translate d-flex mb-4">
                    <a class="@if(session('locale') === 'en') activeText @endif" href="{{ route('locale', 'en') }}">En</a>
                    <div class="header__inclined">/</div>
                    <a class="@if(session('locale') === 'ru') activeText @endif" href="{{ route('locale', 'ru') }}">Ru</a>

{{--                    <input class="d-none" id="en" type="radio" name="translate"/>--}}
{{--                    <label for="en" class="activeText">En</label>--}}
{{--                    <div class="footer__inclined mx-2">/</div>--}}
{{--                    <input class="d-none" id="ru" type="radio" name="translate" checked="checked"/>--}}
{{--                    <label for="ru" class="">Ru</label>--}}
                </li>
                <li class="footer__money mb-4">
                    <input class="d-none" id="dollar" type="radio" name="money"/>
                    <label for="dollar" class="activeText">$</label>
                    <input class="d-none" id="euro" type="radio" name="money"/>
                    <label for="euro" class="mx-1">€</label>
                    <input class="d-none" id="rub" type="radio" name="money" checked="checked"/>
                    <label for="rub" class="">₽</label>
                </li>
                <li class="footer__search">
                    <footer-search-component
                            :search="{{ json_encode($basic['search']) }}"
                    />

                </li>
            </ul>

            @if(count($basic['socialNetworks']) && $basic['socialNetworks'])
                <div class="footer__element7 unit d-flex flex-wrap element7 align-items-center align-items-md-start ml-auto">

                    @foreach($basic['socialNetworks'] as $item)

                        <div class="social__network">
                            <a href="{{ $item->href }}" class="service1">
                                {!! $item->icon !!}
                            </a>
                        </div>

                    @endforeach
                </div>

            @endif




        </div>
    </div>
</footer>
