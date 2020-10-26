@extends('layouts.app')


@section('content')


    <section>
        <div class="container">

            <form action="{{ route('user.balance.store') }}" method="POST" class="py-5">
                @csrf
                @method('POST')

                <input style="color: red" type="number">
                <button type="submit">Add</button>

            </form>

        </div>
    </section>

@endsection