@extends('layouts.app')

@section('content')


{{--        @includeWhen(count($slider), 'all.main.include.fScreen')--}}
{{--        @include('all.main.include.luck')--}}
        @includeWhen(count($catalog), 'all.main.include.catalog')
{{--        @includeWhen(count($news), 'all.main.include.news')--}}
{{--        @include('all.main.include.proposal')--}}


@endsection