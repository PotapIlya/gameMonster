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


    @includeWhen(count($slider), 'all.main.include.fScreen2')
    @includeWhen(count($link), 'all.main.include.luck')
    @includeWhen(count($catalog), 'all.main.include.catalog')
    @include('all.main.include.news')
    @includeWhen(count($proposal), 'all.main.include.proposal')



{{--    @include('base.modal.modalBonus')--}}

{{--    @include('base.modal.modalAuth')--}}


@endsection


@section('footer')



    <script>
        if (document.querySelector('.modal-bonus'))
        {
            const modal = document.querySelector('.modal-bonus')
            const open = document.getElementById('bonus');

            const modalWrap = modal.querySelector('.global-wrap')
            const close = modal.querySelector('.close')

            const cash = modal.querySelector('.getCash')



            cash.addEventListener('click', () => {
                if (modal.classList.contains('d-block'))
                {
                    const input = cash.parentElement.querySelector('input');
                    input.removeAttribute('disabled');

                    input.select();
                    document.execCommand("copy");

                    input.setAttribute('disabled', 'disabled');

                    modal.classList.remove('d-block');
                }
            })


            open.addEventListener('click', () => {
                modal.classList.add('d-block')
            })

            window.addEventListener('click', (e) => {
                if (e.target === modalWrap )
                {
                    modal.classList.remove('d-block')
                }
            })
            close.addEventListener('click', () => {
                modal.classList.remove('d-block')
            })

        }
    </script>

@endsection