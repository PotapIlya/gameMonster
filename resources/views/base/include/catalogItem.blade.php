
{{--@dd(session('locale'))--}}

{{--@dd( $item->getTranslations()['title'][session('locale')] )--}}

<div class="col-10 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-4">
    <a href="{{ route('mainShow', $item->url) }}" class="w-100">
        <div class="catalog__wrapper d-flex flex-column">
            <div class="catalog__img">
                <div>
                    @if( !is_null($item->preloader) && $item->preloader )
                        <img class="w-100" src="/storage/{{ $item->preloader }}" alt="">
                    @else
                        <img class="w-100" src="/assets/static/img/main/no-image.png" alt="">
                    @endif
                </div>
                <div class="catalog__text test">
                    @if($item->discounts)
                        <div class="d-flex justify-content-end" style="position: absolute; top: -40px; right: 10px;">
                            <div class="rate"> -{{ $item->discounts }}% </div>
                        </div>
                    @endif

                    <div class="catalog__price">
                        @if(!is_null($item->price) && $item->price)
                            <div class="new">
                                {{ json_decode($item->price, true)[session('currency')] }}
                                {{ session('currencyIcon') }}
                            </div>
                        @endif
                        @if(!is_null($item->old_price) && $item->old_price)
                            <div class="old">
                                {{ json_decode($item->old_price, true)[session('currency')] }}
                                {{ session('currencyIcon') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="catalog__tags">
                    @if($item->novelty)
                        <span class="catalog__tags-item pink mr-2">
                            @lang('template/base.catalogItem.new')
                        </span>
                    @endif
                    @if($item->exclusive)
                        <span class="catalog__tags-item pink mr-2">
                            @lang('template/base.catalogItem.exclusive')
                        </span>
                    @endif
                    @if($item->pre_order)
                        <span class="catalog__tags-item black mr-2">
                            @lang('template/base.catalogItem.preOrder')
                        </span>
                    @endif
                    @if($item->early_access)
                        <span class="catalog__tags-item black mr-2">
                            @lang('template/base.catalogItem.earlyAccess')
                        </span>
                    @endif
                </div>
            </div>
            <div class="mt-1">
                <div class="d-flex align-items-center justify-content-between">

                    @if( $item->title)
                        <div class="catalog__title">
                            {{ $item->title }}
                        </div>
                    @endif
                    <div class="catalog__playground mr-0 mr-lg-4">
                        <img class="mw-100" src="/assets/static/img/main/icon/steam.svg" alt="">
                    </div>
                </div>

                @if(count($item->category))
                    <div class="catalog__category">
                        @foreach($item->category as $category)
                            <span class="catalog__category-item mr-2">
                                {{ $category->name }}
                            </span>
                        @endforeach

                    </div>
                @endif
            </div>
        </div>
    </a>



    @if($show)
        <div class="mt-2 showCart"
             data-key="{{ $item->pivot->key }}"
        >
            <span>
                @lang('all/showCatalog.showProduct')
            </span>
        </div>
    @endif

</div>