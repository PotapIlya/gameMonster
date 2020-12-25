<footer class="footer">
    <div class="footer__container mx-auto">
        <div class="footer__row">

            <div class="footer__element1 element1 unit">
                <img src="/assets/static/img/main/logo.svg" alt="Game Monster"/>
            </div>

            @if($basic['nav'])

                <ul class="footer__element2 element2 unit">

                    @foreach($basic['nav'] as $index=>$li)
                        @if($index <= 6)

                            @if($index === 3 || $index === 4)

                            @else
                                <li class="footer__item">
                                    <a class="footer__link" href="{{ $li->url }}">
                                        {{ json_decode($li->name_desc, true)[session('locale')] }}
                                    </a>
                                </li>
                            @endif

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
                    <div class="footer__icons d-flex align-items-center">
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
                            <footer-modal-auth-component
                                :translate="{{ json_encode(trans('template/modal.auth')) }}"
                            />
                        @endif

                    </li>
                @endguest
                <li class="footer__translate d-flex mb-4">
                    <a class="@if(session('locale') === 'en') activeText @endif" href="{{ route('locale', 'en') }}">En</a>
                    <div class="header__inclined">/</div>
                    <a class="ml-1 @if(session('locale') === 'ru') activeText @endif" href="{{ route('locale', 'ru') }}">Ru</a>
                </li>
                <li class="footer__money d-flex mb-4">

                    <a href="{{ route('currency', 'USD') }}"
                       class="label d-block @if(session('currency') === 'USD') activeText @endif">$</a>
                    <a href="{{ route('currency', 'EUR') }}"
                       class="label d-block @if(session('currency') === 'EUR') activeText @endif">€</a>
                    <a href="{{ route('currency', 'RUB') }}"
                       class="label d-block @if(session('currency') === 'RUB') activeText @endif">₽</a>

                </li>
                <li class="footer__search">
                    <footer-search-component
                            :search="{{ json_encode($basic['search']) }}"
                            :locale="{{ json_encode(session('locale')) }}"
                            :translate="{{ json_encode(trans('template/header.userDropdown.searchFooter')) }}"
                    />

                </li>
            </ul>

            @if(count($basic['socialNetworks']) && $basic['socialNetworks'])
                <div class="footer__element7 unit d-flex flex-wrap element7 align-items-center  ml-auto">

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
