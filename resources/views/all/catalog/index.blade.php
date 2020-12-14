@extends('layouts.app')

@section('content')

    <section class="catalogPage">
        <div class="container">
            <div>
                <h3 class="section__title">
                    Каталог игр
                </h3>
            </div>


            <all-catalog-component
                    :category="{{ json_encode($category) }}"
            />





{{--            @if(count($games))--}}
{{--                @foreach($games as $item)--}}
{{--                    @include('base.include.catalogItem', ['item' => $item, 'show' => false])--}}
{{--                @endforeach--}}
{{--            @endif--}}


{{--            {{ $games->links() }}--}}

        </div>
    </section>

@endsection