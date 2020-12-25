@extends('layouts.app')


@section('content')

    <section class="newsShow">
        <div class="container">

            <div class="col col-lg-8 mx-auto">

                <div>
                    <h3 class="section__title newsShow__title">
                        {{ json_decode($item->title, true)[session('locale')] ?? '' }}
                    </h3>
                </div>
                @if( !is_null($item->category) && count($item->category) && $item->category )
                    <div class="newsShow__tags row align-items-center">

                        @foreach($item->category as $category)
                            <div class="newsShow__tags-item">
                                {{ json_decode($category->name, true)[session('locale')] ?? ''}}
                            </div>
                        @endforeach

                        <div class="newsShow__tags-data col-12 col-sm">
{{--                            12 сентября, 19:30--}}

                            {{ $category->created_at }}
                        </div>

                    </div>
                @endif

                <div class="newsShow__wrapper">
                    <h4 class="newsShow__wrapper-title">
                        {{ json_decode($item->subTitle, true)[session('locale')] ?? '' }}
                    </h4>

                    <p class="newsShow__wrapper-text">
                        {{ json_decode($item->text_1, true)[session('locale')] ?? '' }}
                    </p>

                    @if( !is_null($item->img) && $item->img )
                        <div>
                            <img class="newsShow__wrapper-img w-100"
                                 src="/storage/{{ $item->img }}"
                                 alt="">
                        </div>
                    @endif

                    <p class="newsShow__wrapper-text">
                        {{ json_decode($item->text_2, true)[session('locale')] ?? '' }}
                    </p>

                    @if( !is_null($item->list) && $item->list )
                        <div class="newsShow__wrapper-whatDo">
                            <h5 class="newsShow__wrapper-whatDo-title">
                                What we do
                            </h5>
                            <ul class="newsShow__wrapper-whatDo-ul">
                                @foreach(json_decode($item->list, true) as $list)
                                    <li>
                                        {{ $list['name'] }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if( !is_null($item->img_group) && $item->img_group )
                        <div class="newsShow__wrapper-slider">

                            <div class="swiper-container gallery-top">
                                <div class="swiper-wrapper">

                                    @foreach(json_decode($item->img_group, true) as $img)
                                        <div class="swiper-slide">
                                            <div>
                                                <img class="newsShow__wrapper-img w-100"
                                                     src="/storage/{{ $img }}" alt="">
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <!-- Add Arrows -->

                            </div>
                            <div class="swiper-container gallery-thumbs">
                                <div class="swiper-wrapper">

                                    @foreach(json_decode($item->img_group, true) as $img)
                                        <div class="swiper-slide">
                                            <div>
                                                <img class="newsShow__wrapper-img w-100"
                                                     src="/storage/{{ $img }}" alt="">
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="swiper-button-next swiper-button-white"></div>
                                <div class="swiper-button-prev d-none swiper-button-white"></div>
                            </div>

                        </div>
                    @endif




                </div>




                @if( count($otherNews) )
                    <div class="newsShow__other">
                        <div>
                            <h3 class="section__title aboutPage__title mt-4">
{{--                                Другие новости--}}
                                @lang('all/news.otherGame')

                            </h3>
                        </div>
                        <div class="newsShow__other-wrapper d-flex align-items-center justify-content-between">

                            @foreach($otherNews as $new)
                                @includeWhen( !is_null($new) && $new , 'all.news.include.cart', ['item' => $new])
                            @endforeach

                        </div>
                    </div>
                @endif




                <div class="newsShow__comments">

                    <div class="d-flex align-items-end">
                        <h3 class="section__title newsShow__comments-title mb-0">
                            @lang('all/news.comment.title')
                        </h3>
                        <button class="newsShow__comments-addComment d-none d-sm-block">
                            +  @lang('all/news.comment.addComment')
                        </button>
                    </div>



                    <div class="newsShow__comments-wrapper d-flex flex-column">

                        @include('all.news.include.comment')
                        @include('all.news.include.comment')
                        @include('all.news.include.comment')


                        <div class="d-flex justify-content-center">
                            <button class="newsShow__comments-showMore">
                                @lang('all/news.comment.showMore')
                            </button>
                        </div>

                    </div>


                </div>

            </div>



        </div>
    </section>

@endsection


@section('footer')

    <script>
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: galleryThumbs
            }
        });
    </script>

@endsection








