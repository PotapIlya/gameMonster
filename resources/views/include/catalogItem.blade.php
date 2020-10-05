
<div class="col-6 col-md-5 col-lg-4 col-xl-3">
    <a class="catalog__item" href="{{ route('mainShow', $item->id) }}">
        <div class="catalog__item-img" style="background:url(/storage/{{ $item->preloader }}) no-repeat center center; background-size: cover">
            <div class="catalog__item-info row">

                @if($item->novelty)
                    <span class="catalog__item-info-item pink mr-2">Новинка</span>
                @endif
                @if($item->exclusive)
                    <span class="catalog__item-info-item pink mr-2">Эксклюзив</span>
                    @endif
                @if($item->pre_order)
                    <span class="catalog__item-info-item black">Предзаказ</span>
                @endif
                @if($item->early_access)
                    <span class="catalog__item-info-item black">Ранний доступ</span>
                @endif

            </div>
            <div class="catalog__item-type"></div>
            <div class="rate"> -{{ $item->discounts }}%</div>
            <div class="catalog__price">
                <div class="new">{{ $item->price }}</div>
                <div class="old">{{ $item->old_price }}</div>
            </div>
        </div>
        <h4 class="catalog__item-title">{{ $item->title }}</h4>
        <div class="catalog__item-company" style="background:url(/img/game/steam.svg)"></div>
        @isset($item->category)
            <div class="catalog__item-tags">
                @foreach($item->category as $category)
                    <div class="catalog__item-tag">{{ $category->name }}</div>
                @endforeach
            </div>
        @endisset
    </a>
</div>
