@extends('layouts.app')


@section('header')

    <script>
        if (document.querySelector('.myCrutch'))
        {

            const myCrutch = document.querySelectorAll('.myCrutch');

            let xx = () =>{
                myCrutch.forEach(x =>
                {
                    if (x.clientHeight > 0)
                    {
                        x.parentElement.style.height = x.clientHeight+'px'
                    }
                })
            }
            xx()

            setTimeout(() =>{
                xx()
            }, 500)
            window.addEventListener('resize', () =>{
                xx();
            })
        }
    </script>


@endsection

@section('content')


    @includeWhen(count($slider), 'all.main.include.fScreen')
    @includeWhen(count($link), 'all.main.include.luck')
    @includeWhen(count($catalog), 'all.main.include.catalog')
    @include('all.main.include.news')
    @includeWhen(count($proposal), 'all.main.include.proposal')




{{--    @include('base.modal.modalAuth')--}}


@endsection