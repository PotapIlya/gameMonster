@extends('layouts.app')


@section('content')


    <section class="development">
        <div class="container px-0">
            <div class="development__wrap col-12 col-md-10 pt-5">
                <div class="">
                    <h1 class="development__title mt-0 mb-4">
{{--                        Раздел 	находится<br> в разработке--}}

                        The section is located<br>
                        in developing
                    </h1>
                </div>
                <div class="d-flex justify-content-center justify-content-md-start justify-content-md-start">
                    <p class="development__subtitle px-0">
                        Subscribe to service updates, <br>
                        to keep abreast of all events
{{--                        Подпишитесь на обновления сервиса,<br>--}}
{{--                        чтобы быть в курсе всех событий--}}
                    </p>
                </div>

                <form class="development__form d-flex flex-column flex-md-row justify-content-center justify-content-md-start align-items-center">
                    <label for="" class="col-10 col-sm-8 col-md-4 pl-0 mb-3 mb-md-0">
                        <input class="w-100 development__input " type="email" placeholder="E-mail">
                    </label>

                    <div class="col-10 col-sm px-0">
                        <button type="submit" class="button development__button">
                            Subscribe
{{--                            Подписаться--}}
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </section>


@endsection