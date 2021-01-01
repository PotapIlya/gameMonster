

<section class="home">
    <div class="container px-0">

        <div class="d-flex justify-content-between px-0 mx-0">

            <div class="col-4 px-0 d-none d-lg-block h-100">

                <div>
                    <img class="home__img myCrutch" src="/assets/static/img/fScreen/head.png" alt=""/>
                </div>

                
                <div class="home__title d-flex align-items-end">
                    @lang('all/main.fScreen.title')
                </div>
            </div>

            <div class="col-12 col-lg-7 d-flex flex-column align-items-end px-0 px-sm-4 px-lg-0">

                <div class="swiper-container swiper-home mb-auto mw-100">
                    <div class="swiper-wrapper d-flex align-items-center">

                        @foreach($slider as $item)

                            <a style="height: 550px" href="{{ $item->url }}" class="swiper-slide d-flex justify-content-end">
                                <div class="w-100">
                                    <div class="swiper-slide-fixed"></div>
                                    <img class="w-100"
                                         src="/storage/{{ $item->img }}" alt="">
                                </div>
                                <div class="swiper-slide-text h-100 d-flex flex-column justify-content-between py-0 py-md-5">
                                    @if(!is_null($item->title) && $item->title)
                                        <h1 class="slide-title">
                                            {{ $item->title }}
                                        </h1>
                                    @endif
                                    <div class="slide-group">
                                        <div class="d-flex align-items-center mb-1">
                                            @if(!is_null($item->price) && $item->price)

                                                <div class="slide-new mr-4">
                                                    {{ json_decode($item->price, true)[session('currency')] }}
                                                    {{ session('currencyIcon') }}
                                                </div>
                                            @endif
                                            @if(!is_null($item->discounts) && $item->discounts)
                                                <div class="slide-rate">-{{ $item->discounts }}%</div>
                                            @endif
                                        </div>
                                        @if(!is_null($item->old_price) && $item->old_price)
                                            <div class="slide-old">
                                                {{ json_decode($item->old_price, true)[session('currency')] }}
                                                {{ session('currencyIcon') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        @endforeach

                    </div>
                    <div class="swiper-home_pagination d-flex justify-content-center my-3"></div>
                </div>
                <div class="swiper-container swiper-home_thumbs mw-100 mr-0 mb-4">
                    <div class="swiper-wrapper">

                        @foreach($slider as $item)
                            <div class="swiper-slide swiper-slide-bottom">
                                <div class="swiper-slide-bottom1"></div>
                                <div class="swiper-slide-bottom2"></div>

                                <img class="mw-100" src="/storage/{{ $item->img }}" alt="">
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>


