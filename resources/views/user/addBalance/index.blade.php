@extends('layouts.app')


@section('content')


    <section>
        <div class="container">

            <form action="" method="POST" class="py-5">
                @csrf

                <input type="number">
                <button type="submit">Add</button>

            </form>

        </div>
    </section>

@endsection