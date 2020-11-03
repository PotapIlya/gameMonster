@extends('layouts.app')



@section('content')

    <div class="container">

        @if($errors->any())
            @php
                var_dump($errors->all())
            @endphp

        @endif

        <form id="formElem" action="/testPost" method="POST">

            @csrf
            <input type="text" name="number" value="200000000000">
            <button type="submit">submit</button>

        </form>

    </div>


    <script>

        setTimeout(() =>
        {
            const formElem = document.getElementById('formElem');
            // console.log(formElem)
            formElem.onsubmit = async (e) => {
                e.preventDefault();

                let response = await fetch('/testPost', {
                    method: 'POST',
                    body: new FormData(formElem)
                });

                let result = await response.json();

                console.log(result)
            };

        }, 1000)



    </script>

@endsection