@extends('layouts.app')


@section('content')


    <section class="balance">
        <div class="container">

            <form action="{{ route('user.balance.store') }}" method="POST" class="py-5 d-flex flex-column">
                @csrf
                @method('POST')

               <div class="d-flex align-items-center">
                   <input placeholder="Введите цену" type="number" class="mr-2" name="money" required>
                   <button type="submit">Add</button>

                   @error('money')
                        <strong>
                            {{ $message }}
                        </strong>
                   @enderror
               </div>


                <div class="row align-items-center">

                    @error('name')
                        <strong>
                            {{ $message }}
                        </strong>
                    @enderror

                   <div class="col-3 balance__item">

                       <input name="name" value="qiwi" class="" type="radio" id="qiwi" required checked>
                       <label for="qiwi">
                           <span class="col-6">
                               <img class="w-100" src="/assets/static/img/pay/qiwi.png" alt="">
                           </span>
                       </label>
                   </div>

                    <div class="col-3 balance__item">

                        <input name="name" value="paypal" class="" type="radio" id="paypal" required>
                        <label for="paypal">
                           <span class="col-6">
                               <img class="w-100" src="/assets/static/img/pay/paypal.png" alt="">
                           </span>
                        </label>
                    </div>

                </div>
            </form>

        </div>
    </section>

@endsection