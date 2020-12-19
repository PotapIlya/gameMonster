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

                        <h3 class="aboutPage__text-title">
                            На одной волне
                        </h3>
                        <span class="aboutPage__text-description">
                            Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit.
                        </span>
                    </div>
                </div>

                
            </div>
            

        </div>
    </section>

@endsection