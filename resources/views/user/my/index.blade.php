@extends('layouts.app')



@section('content')


    <section class="my mb-5">
        <div class="container">
           <div class="d-flex justify-content-between potap ">
               <div>
                   <app-my-component
                           :user_data="{{ $user }}"
                   />
               </div>

               <div class="col-5">
                   <div>
                       <h1>Привязать аккаунт</h1>
                       @include('base.alert.success')
                   </div>
                   <div class="mt-3">

                     <div class="service1">
                         @if(!is_null($user->services->pluck('type')->flip()->get('steam')))
                             <div>
                                 <img src="/assets/static/img/services/steam.png" alt="steam">
                             </div>
                             <div class="col-1">
                                 <img class="mw-100" src="/assets/static/img/main/greenOK.png" alt="">
                             </div>
                         @else
                             <a href="/login/steam" class="service1">
                                 <div>
                                     <img src="/assets/static/img/services/steam.png" alt="steam">
                                 </div>

                             </a>
                         @endif
                     </div>

                     <div class="service2">
                         @if(!is_null($user->services->pluck('type')->flip()->get('google')))
                             <div class="col-1">
                                 <img src="/assets/static/img/services/google.png" alt="google">
                             </div>
                             <div class="col-1">
                                 <img class="mw-100" src="/assets/static/img/main/greenOK.png" alt="">
                             </div>
                         @else
                             <a href="/login/google">
                                 <div>
                                     <img src="/assets/static/img/services/google.png" alt="google">
                                 </div>

                             </a>
                         @endif
                       </div>
                       <div class="service3">
                           @if(!is_null($user->services->pluck('type')->flip()->get('vk')))
                               <div class="col-1">
                                   <img src="/assets/static/img/services/vk.png" alt="vk">
                               </div>
                               <div class="col-1">
                                   <img class="mw-100" src="/assets/static/img/main/greenOK.png" alt="">
                               </div>
                           @else
                               <a href="/login/vkontakte">
                                   <div>
                                       <img src="/assets/static/img/services/vk.png" alt="vk">
                                   </div>
                               </a>
                           @endif
                       </div>


{{--                       <a href="/login/facebook" class="service4">--}}
{{--                           <img src="/assets/static/img/services/facebook.png" alt="facebook">--}}
{{--                       </a>--}}
                   </div>

               </div>
           </div>
        </div>
    </section>


    @if(count($user->history))
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
    @endif




    @include('base.modal.modalKey')
@endsection

