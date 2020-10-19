<section class="catalog">
    <div class="container">
        <div class="row justify-content-center justify-content-lg-start">
            <div class="col-md-12 col-xl pl-4 pl-xl-2 d-flex justify-content-between align-items-center justify-content-lg-start">
                <h3 class="section__title">Каталог игр</h3>
                <a href="/development" class="section__subtitle mb-2">Все игры</a>
            </div>
        </div>
        <div class="row catalog__row pl-0 pl-sm-3 pl-xl-0 justify-content-center">

            @foreach($catalog as $item)
                @include('base.include.catalogItem', ['item' => $item, 'show' => false])
            @endforeach

        </div>
    </div>
</section>