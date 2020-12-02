<section class="proposal">
    <div class="container">


        <div class="row justify-content-between">

{{--            @dd($proposal[0])--}}

            <div class="proposal_item proposal_item_1">
                <div>
                    <img class="myCrutch d-none d-lg-block" src="/storage/{{ $proposal[0]->img }}" alt="">
                    <img class="d-block d-lg-none" src="/storage/{{ $proposal[0]->mobile_img }}" alt="">
                </div>
                <div id="bonus" class="proposal_item__wrapper proposal_item__wrapper-1 d-flex flex-column justify-content-between">
                    <div class="proposal_item-title">
                        {{ $proposal[0]->title ?? ''}}
{{--                        Система <br>--}}
{{--                        рефералов--}}
                    </div>
                    <div class="proposal_item-text">
                        {{ $proposal[0]->text ?? '' }}
{{--                        Приглашайте друзей<br>--}}
{{--                        и получайте бонусы--}}
                    </div>
                    <div>
                        @if(!is_null($proposal[0]->button) && $proposal[0]->button)
                            <button class="proposal_item-btn">
                                {{ $proposal[0]->button ?? '' }}
{{--                                Подробнее--}}
                            </button>
                        @endif
                    </div>
                </div>

            </div>
            <div class="proposal_item proposal_item_2">
                <img class="myCrutch d-none d-lg-block" src="/storage/{{ $proposal[1]->img }}" alt="">
                <img class="d-block d-lg-none" src="/storage/{{ $proposal[1]->mobile_img }}" alt="">

                <div class="proposal_item__wrapper proposal_item__wrapper-2 d-flex flex-column justify-content-between">
                    <div class="proposal_item-title">
                        {{ $proposal[1]->title ?? ''}}
{{--                        Уникальные<br class="d-none d   -md-block">--}}
{{--                        скидки<br>--}}
{{--                        и бонусы--}}
                    </div>
                    <div class="proposal_item-text">
                        {{ $proposal[1]->text ?? ''}}
{{--                        При подписке<br>--}}
{{--                        на новости<br>--}}
{{--                        сервиса--}}
                    </div>
                    @if(!is_null($proposal[1]->button) && $proposal[1]->button)
                        <form class="d-flex justify-content-between  align-items-center">
                            <label for="" class="w-100 mb-0 mb-xl-0 mr-0 mr-sm-4 mr-lg-0 mr-xl-4">
                                <input class="w-100" name="email" placeholder="E-mail" type="text">
                            </label>
                            <div class="ml-3">
                                <button class="proposal_item-btn mt-2 mt-sm-0">
                                    {{ $proposal[1]->button ?? '' }}
    {{--                                Подписаться--}}
                                </button>
                            </div>
                        </form>
                    @endif
                </div>

            </div>



            <div class="proposal_item proposal_item_3">
                <div>
                    <img class="myCrutch d-none d-lg-block" src="/storage/{{ $proposal[2]->img }}" alt="">
                    <img class="d-block d-lg-none" src="/storage/{{ $proposal[2]->mobile_img }}" alt="">
                </div>

                <div class="proposal_item__wrapper proposal_item__wrapper-3 d-flex justify-content-center justify-content-sm-start align-items-end col-12 col-lg-10 col-xl-8">
                    <div class="proposal_item-title d-none d-lg-block col-xl-6">
                        {{ $proposal[2]->title ?? ''}}
{{--                        Остались вопросы?--}}
                    </div>
                    @if(!is_null($proposal[2]->button) && $proposal[2]->button)
                        <form class="d-flex flex-column-reverse flex-sm-row-reverse flex-lg-row align-items-end justify-content-end align-items-center align-items-sm-end">
                            <div class=" mr-0 mr-lg-4 ml-0 ml-sm-4 ml-lg-0 mt-2 mt-sm-0 d-none d-lg-block">
                                <button class="proposal_item-btn">
                                    {{ $proposal[2]->button ?? '' }}
    {{--                                Отправить--}}
                                </button>
                            </div>
                            <div class="d-flex flex-lg-column flex-column-reverse mx-auto">

                                <label class="w-100 mb-0 mb-lg-3 mt-3 mt-lg-0 d-flex align-items-center" for="">
                                    <input placeholder="E-mail" class="w-100" type="text">
                                    <div class=" mr-0 mr-lg-4 ml-0 ml-sm-4 ml-lg-0 mt-2 mt-sm-0 d-block d-lg-none">
                                        <button class="proposal_item-btn">
                                            {{ $proposal[2]->button ?? '' }}
    {{--                                        Отправить--}}
                                        </button>
                                    </div>
                                </label>
                                <label for="">
                                    <textarea placeholder="Message" class="d-block " name="" id="" cols="30" rows="7"></textarea>
                                </label>
                                <span class="d-block d-lg-none proposal_item-title">
                                      {{ $proposal[2]->title ?? ''}}
    {{--                                Остались--}}
    {{--                                вопросы?--}}
                                </span>
                            </div>
                        </form>
                    @endif
                </div>

            </div>

        </div>

    </div>

</section>
