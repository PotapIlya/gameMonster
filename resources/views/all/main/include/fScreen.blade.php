
<div class="home">
    <div class="container px-0">

        <div class="d-flex justify-content-between px-0 mx-0">

            <div class="col-4 px-0 d-none d-lg-block">
                <div>
                    <img class="home__img myCrutch" src="/assets/static/img/fScreen/head.png" alt=""/>
                </div>
                <div class="home__title d-flex align-items-end">
                    Страшные скидки в честь открытия
                </div>
            </div>

            <div class="col-12 col-lg-7 d-flex flex-column align-items-end px-0 px-sm-4 px-lg-0">

                <div class="swiper-container swiper-home mb-45 mw-100">
                    <div class="swiper-wrapper">

                        @foreach($slider as $item)
{{--                            @dd($item)--}}
                            <a href="{{ $item->url }}" class="swiper-slide d-flex justify-content-end">
                                <div class="w-100">
                                    <img class="w-100 d-none d-lg-block"
                                         src="/storage/{{ $item->img }}" alt="">
                                    <img class="w-100 d-block d-lg-none"
                                         src="/storage/{{ $item->img }}" alt="">
                                </div>
                                <div class="swiper-slide-text h-100 d-flex flex-column justify-content-between py-0 py-md-5">
                                    <h1 class="slide-title">
                                        Witcher 3:<br>
                                        Wild Hunt
                                    </h1>
                                    <div class="slide-group">
                                        <div class="d-flex align-items-center mb-1">
                                            <div class="slide-new mr-4">{{ $item->price }}P</div>
                                            <div class="slide-rate">-{{ $item->discounts }}%</div>
                                        </div>
                                        <div class="slide-old">{{ $item->old_price }}P</div>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                    </div>
                    <div class="swiper-home_pagination d-flex justify-content-center my-3"></div>
                </div>
                <div class="swiper-container swiper-home_thumbs mw-100 mr-0">
                    <div class="swiper-wrapper">

                        @foreach($slider as $item)
                            <div class="swiper-slide">
                                <img class="mw-100" src="/storage/{{ $item->img }}" alt="">
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


