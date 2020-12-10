

<section class="luck d-block d-md-none d-xl-block">
    <div class="container">
        <div>
            <h3 class="section__title">
                @lang('all/main.luck.title')
            </h3>
        </div>

        <div class="d-flex flex-column flex-md-row align-items-center luck__block">


            @foreach($link as $i=>$item)

                <a class="luck__item " href="{{ $item->href }}">
                    <div class="luck__item-img">
                        <div class="luck__item-title">
                        </div>
                        @if(!is_null($item->discount) && $item->discount)
                            <div class="rate">-{{ $item->discount }}%</div>
                        @endif
                    </div>
                    <div class="luck__item-img-block">
                        <img class="luck__item-img-detail luck__item-img-detail_{{ $i+1 }}" src="/storage/{{ $item->img }}" alt=""/>
                    </div>
                    <div class="luck__item-text-block">

                        @if(!is_null($item->games) && $item->games)
                            <div class="luck__item-text">{{ $item->games }} @lang('all/main.luck.games')</div>
                        @endif
                        @if(!is_null($item->profit) && $item->profit)
                            <div class="luck__item-text">{{ $item->profit }}% @lang('all/main.luck.profit')</div>
                        @endif
                        @if(!is_null($item->games_form) && $item->games_form)
                            <div class="luck__item-text">@lang('all/main.luck.gamesFrom') $ {{ $item->games_form }}</div>
                        @endif
                    </div>
                    <div class="luck__item-price">
                        @if(!is_null($item->new_price) &&$item->new_price)
                            <div class="new">$ {{ $item->new_price }}</div>
                        @endif
                        @if(!is_null($item->old_price) &&$item->old_price)
                            <div class="old">$ {{ $item->old_price }}</div>
                        @endif
                    </div>
                </a>

            @endforeach

{{--            <a class="luck__item" href="#!">--}}
{{--                <!--					<div class="luck__item-img" style="background:url(./img/luck/common.png) no-repeat center center">-->--}}
{{--                <div class="luck__item-img">--}}
{{--                    <!--						<div class="luck__item-title">-->--}}
{{--                    <!--							<img src="./img/luck/common-title.png" alt="Epic"/>-->--}}
{{--                    <!--						</div>-->--}}
{{--                    <div class="rate">-30%</div>--}}
{{--                </div>--}}
{{--                <div class="luck__item-img-block">--}}
{{--                    <img class="luck__item-img-detail luck__item-img-detail_2" src="/assets/static/img/luck/common.png" alt=""/>--}}
{{--                </div>--}}
{{--                <div class="luck__item-text-block">--}}
{{--                    <div class="luck__item-text">800 игр</div>--}}
{{--                    <div class="luck__item-text">130% профит</div>--}}
{{--                    <div class="luck__item-text">игры от $ 900</div>--}}
{{--                </div>--}}
{{--                <div class="luck__item-price">--}}
{{--                    <div class="new">$ 800</div>--}}
{{--                    <div class="old">$ 800</div>--}}
{{--                </div>--}}
{{--            </a>--}}

{{--            <a class="luck__item" href="#!">--}}
{{--                <!--					<div class="luck__item-img" style="background:url(./img/luck/legend.png) no-repeat center center">-->--}}
{{--                <div class="luck__item-img">--}}
{{--                    <div class="luck__item-title"><img src="./img/luck/legend-title.png" alt="Epic"/></div>--}}
{{--                    <div class="rate">-30%</div>--}}
{{--                </div>--}}
{{--                <div class="luck__item-img-block">--}}
{{--                    <img class="luck__item-img-detail luck__item-img-detail_3" src="/assets/static/img/luck/legend.png" alt=""/>--}}
{{--                </div>--}}
{{--                <div class="luck__item-text-block">--}}
{{--                    <div class="luck__item-text">800 игр</div>--}}
{{--                    <div class="luck__item-text">130% профит</div>--}}
{{--                    <div class="luck__item-text">игры от $ 900</div>--}}
{{--                </div>--}}
{{--                <div class="luck__item-price">--}}
{{--                    <div class="new">$ 800</div>--}}
{{--                    <div class="old">$ 800</div>--}}
{{--                </div>--}}
{{--             </a>--}}

        </div>
    </div>
</section>