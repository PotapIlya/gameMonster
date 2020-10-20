@extends('layouts.app')



@section('content')


    <section class="my mb-5">
        <div class="container">
            <app-my-component
                    :user_data="{{ $user }}"
            />
        </div>
    </section>

    <section class="my_by">
        <div class="container">
            <div class="mb-2">
                <h2 class="my_by__title">Покупки <span class="my_by-count">{{ count($user->history) }}</span></h2>
            </div>
            <div class="row d-flex justify-content-center justify-content-md-start">
                @foreach($user->history as $item)
                    @include('base.include.catalogItem', ['item' => $item, 'show' => true])
                @endforeach
            </div>
        </div>
    </section>




    @include('base.modal.modalKey')
@endsection

