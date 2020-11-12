@extends('layouts.app')

@section('content')


    @includeWhen(count($slider), 'all.main.include.fScreen')
    @includeWhen(count($link), 'all.main.include.luck')
    @includeWhen(count($catalog), 'all.main.include.catalog')
    @include('all.main.include.news')
    @includeWhen(count($proposal), 'all.main.include.proposal')




{{--    @include('base.modal.modalAuth')--}}


@endsection