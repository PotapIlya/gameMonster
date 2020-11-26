<footer class="footer">
    <div class="footer__container mx-auto">
        <div class="footer__row">

            <div class="footer__element1 element1 unit">
                <img src="/assets/static/img/main/logo.svg" alt="Game Monster"/>
            </div>

            @if($basic['nav'])

                <ul class="footer__element2 element2 unit">

                    @foreach($basic['nav'] as $li)

                    <li class="footer__item"><a class="footer__link" href="{{ $li->url }}">{{ $li->name }}</a></li>

                    @endforeach

{{--                    <li class="footer__item"><a class="footer__link" href="#!">Рулетка</a></li>--}}
{{--                    <li class="footer__item"><a class="footer__link" href="#!">Акции</a></li>--}}
{{--                    <li class="footer__item"><a class="footer__link" href="#!">Гарантии</a></li>--}}
{{--                    <li class="footer__item"><a class="footer__link" href="#!">Контакты</a></li>--}}
                </ul>

            @endif
            <ul class="footer__element3 element3 unit">
                <li class="footer__item"><a class="footer__link" href="#!">Steam</a></li>
                <li class="footer__item"><a class="footer__link" href="#!">Origin</a></li>
                <li class="footer__item"><a class="footer__link" href="#!">Uplay</a></li>
                <li class="footer__item"><a class="footer__link" href="#!">Epic Games</a></li>
                <li class="footer__item"><a class="footer__link" href="#!">Playstation</a></li>
                <li class="footer__item"><a class="footer__link" href="#!">Xbox</a></li>
                <li class="footer__item"><a class="footer__link" href="#!">Мобильные</a></li>
            </ul>
            <ul class="footer__element4 element4 unit ">
                <li class="footer__item"><a class="footer__link" href="#!">Стать партнером</a></li>
                <li class="footer__item"><a class="footer__link" href="#!">Оптовая покупка</a></li>
                <li class="footer__item"><a class="footer__link" href="#!">Лицензионное<br> соглашение</a></li>
            </ul>


            <div class="footer__element5 element5 unit">
                <div class="footer__item-second">
                    <a class="gradient__orange-yellow" href="#!">
                        Аренда аккаунтов
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
                        <div class="d-flex">
                            <div class="footer__auth-item openAuth openModal" data-type="login">Вход</div>
                            <div class="footer__inclined mx-1">/</div>
                            <div class="footer__auth-item openAuth openModal" data-type="login">Регистрация</div>
                        </div>
                    </li>
                @endguest
                <li class="footer__translate d-flex mb-4">
                    <input class="d-none" id="en" type="radio" name="translate"/>
                    <label for="en" class="activeText">En</label>
                    <div class="footer__inclined mx-2">/</div>
                    <input class="d-none" id="ru" type="radio" name="translate" checked="checked"/>
                    <label for="ru" class="activeText">Ru</label>
                </li>
                <li class="footer__money mb-4">
                    <input class="d-none" id="dollar" type="radio" name="money"/>
                    <label for="dollar">$</label>
                    <input class="d-none" id="euro" type="radio" name="money"/>
                    <label for="euro" class="mx-1">€</label>
                    <input class="d-none" id="rub" type="radio" name="money" checked="checked"/>
                    <label for="rub" class="activeText">₽</label>
                </li>
                <li class="footer__search">
                    <div class="footer__search-wrapper ">
                        <input type="text" class="footer__search-input" placeholder="Поиск по Game Monster">
                    </div>
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
{{--                    <div class="social__network">--}}
{{--                        <a href="#" class="service1">--}}
{{--                            <img src="/assets/static/img/main/icon/vk.svg" alt="steam">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="social__network">--}}
{{--                        <a href="#" class="service1">--}}
{{--                            <img src="/assets/static/img/main/icon/inst.svg" alt="steam">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="social__network">--}}
{{--                        <a href="#" class="service1">--}}
{{--                            <img src="/assets/static/img/main/icon/youtube.svg" alt="steam">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="social__network">--}}
{{--                        <a href="#" class="service1">--}}
{{--                            <img src="/assets/static/img/main/icon/telefram.svg" alt="steam">--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>

            @endif




        </div>
    </div>
</footer>
