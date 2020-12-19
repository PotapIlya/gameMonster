
@extends('layouts.app')



@section('header')
    <style>
        .development.noPage .development__title{
            color: #fff;

            background: linear-gradient(#fff, #868686);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;


        }
    </style>
@endsection

@section('content')


    <section class="development noPage">
        <div class="container px-0">
            <div class="development__wrap col-12 col-md-10 pt-5">
                <div class="">
                    <h1 class="development__title mt-0 mb-4">
                        @lang('template/noPage.title')
                    </h1>
                </div>

                <div class="col-10 col-sm mx-auto px-0">
                    <a href="/"  class="button development__button">
                        @lang('template/noPage.btn')
                    </a>
                </div>

            </div>
        </div>

    </section>


@endsection







{{--@extends('errors.layout')--}}

{{--@php--}}
{{--  $error_number = 404;--}}
{{--@endphp--}}

{{--@section('title')--}}
{{--  Page not found.--}}
{{--@endsection--}}

{{--@section('description')--}}
{{--  @php--}}
{{--    $default_error_message = "Please <a href='javascript:history.back()''>go back</a> or return to <a href='".url('')."'>our homepage</a>.";--}}
{{--  @endphp--}}
{{--  {!! isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): $default_error_message !!}--}}
{{--@endsection--}}