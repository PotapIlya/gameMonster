@extends('layouts.app')


@section('content')


    <section class="balance">
        <div class="container">

            <form action="{{ route('user.balance.store') }}" method="POST" class="py-5 d-flex flex-column">
                @csrf
                @method('POST')

               <div class="d-flex align-items-center">
                   <input placeholder="Введите цену" type="number" class="mr-2" name="money">
                   <button type="submit">Add</button>
               </div>

                
                <div class="row align-items-center">

                   <div class="col-3 balance__item">

                       <input name="qiwi" class="" type="checkbox" id="qiwi">
                       <label for="qiwi">
                           <div class="col-6">
                               <img class="w-100" src="/assets/static/img/pay/qiwi.png" alt="">
                           </div>
                       </label>
                   </div>
                    
                </div>
                
            </form>

        </div>
    </section>

@endsection