<section class="catalog">
    <div class="container">
        <div class="row">
            <div class="section__text catalog__text">
                <h3 class="section__title catalog__title">Каталог игр</h3>
                <p class="section__subtitle">Все игры</p>
            </div>
        </div>
        <div class="row catalog__row">

            @foreach($catalog as $item)
                @include('include.catalogItem', ['item' => $item])
            @endforeach

        </div>
    </div>
</section>