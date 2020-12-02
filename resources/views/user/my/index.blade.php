@extends('layouts.app')



@section('content')

{{--    @dd( $user )--}}

    <section class="my mb-5">
        <div class="container">
           <div class="d-flex justify-content-between ">
               <div class="w-100">
                   <app-my-component
                           :user_data="{{ $user }}"
                   />
               </div>
           </div>
        </div>
    </section>


    @if(count($user->history))
        <section class="my_by">
            <div class="container">
                <div class="mb-2">
                    <h2 class="my_by__title">Purchases <span class="my_by-count">{{ count($user->history) }}</span></h2>
                </div>
                <div class="row d-flex justify-content-center justify-content-md-start">
                    @foreach($user->history as $item)
                        @include('base.include.catalogItem', ['item' => $item, 'show' => true])
                    @endforeach
                </div>
            </div>
        </section>
    @endif




    @include('base.modal.modalKey')
@endsection

