@extends('layouts.app')


@section('content')

    <section class="aboutPage">
        <div class="container">

            <div>
                <h3 class="section__title aboutPage__title">
                    О нас
                </h3>
            </div>
            
            
            <div class="aboutPage__wrapper d-flex flex-column justify-content-center align-items-center">


                <div class="aboutPage__item">

                    <div class="aboutPage__img">
                        <img class="w-100" src="/assets/static/img/about/1.png" alt="">
                    </div>
                    <div class="aboutPage__text">

                        <h3 class="aboutPage__text-title mb-3">
                            На одной волне
                        </h3>
                        <span class="aboutPage__text-description">
                            Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit.
                        </span>
                    </div>
                </div>


                <div class="aboutPage__item">

                    <div class="aboutPage__img">
                        <img class="w-100" src="/assets/static/img/about/2.png" alt="">
                    </div>
                    <div class="aboutPage__text">

                        <h3 class="aboutPage__text-title mb-3">
                            Любимая работа
                        </h3>
                        <span class="aboutPage__text-description">
                           У нас нет секрета успеха, нам просто в кайф заниматься тем, чем мы занимаемся и развиваться так, как развиваемся.
                        </span>
                    </div>
                </div>


                <div class="aboutPage__item">

                    <div class="aboutPage__img">
                        <img class="w-100" src="/assets/static/img/about/3.png" alt="">
                    </div>
                    <div class="aboutPage__text">

                        <h3 class="aboutPage__text-title mb-3">
                            На одной волне
                        </h3>
                        <span class="aboutPage__text-description">
                            Мы сами геймеры, так что продавать игры для нас не только бизнес, но и большое удовольствие.
                        </span>
                    </div>
                </div>


                <div class="aboutPage__item">

                    <div class="aboutPage__img">
                        <img class="w-100" src="/assets/static/img/about/4.png" alt="">
                    </div>
                    <div class="aboutPage__text">

                        <h3 class="aboutPage__text-title mb-3">
                            Связаться
                            с нами
                        </h3>
                        <form action="" method="POST">
                            @csrf

                            <label for="">
                                <input class="aboutPage__form" type="text" name="email" required placeholder="E-mail">
                            </label>
                            <textarea class="aboutPage__form" name="message" style="resize: none" placeholder="Message"></textarea>

                            <div class="">
                                <button class="aboutPage__send" type="submit">Send</button>
                            </div>

                        </form>
                    </div>
                </div>



            </div>
            

        </div>
    </section>

@endsection