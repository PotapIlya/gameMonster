@extends('layouts.app')



@section('content')


    <app-my-component
        :user_data="{{ Auth::user() }}"
    />

    <section class="my_by">
        <div class="container">
            <div class="mb-2">
                <h2 class="my_by__title">Покупки <span class="my_by-count">3</span></h2>
                <button id="key" class="button mr-3" style="color: #000">Key</button>
                <button id="bonus" class="button" style="color: #000">Bonus</button>

                <div class="my-3">
                    <div class="mb-3">
<!--							--><?// include 'include/alert/success.php'; ?>
                    </div>
                    <div>
<!--							--><?// include 'include/alert/error.php'?>
                    </div>
                </div>

            </div>
            <div class="row d-flex justify-content-center justify-content-md-start">
{{--					<? include 'template/__item.php'?>--}}
            </div>
        </div>
    </section>



		<?
//		include 'template/__modalKey.php';
//		include 'template/__modalBonus.php';
//		include 'template/__modalAuth.php';
		?>







    {{--    <div class="container">--}}
{{--       <div class="d-flex justify-content-between col-6">--}}
{{--           <form action="{{ route('user.update', Auth::id()) }}" method="POST">--}}
{{--               @method('PATCH')--}}
{{--               @csrf--}}
{{--               <div class="form-group">--}}
{{--                   <label for="exampleInputLogin">Login</label>--}}
{{--                   <input value="{{ Auth::user()->name }}" type="text" class="form-control" id="exampleInputLogin" aria-describedby="emailHelp" placeholder="login" name="name">--}}
{{--               </div>--}}
{{--               <div class="form-group">--}}
{{--                   <label for="exampleInputEmail1">Email address</label>--}}
{{--                   <input value="{{ Auth::user()->email }}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">--}}
{{--                   <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
{{--               </div>--}}
{{--               <div class="form-group">--}}
{{--                   <label for="exampleInputPhone">Phone</label>--}}
{{--                   <input value="{{ Auth::user()->phone }}" type="number" class="form-control" id="exampleInputPhone" placeholder="Phone" name="phone">--}}
{{--               </div>--}}
{{--               <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--           </form>--}}

{{--           <form action="{{ route('user.update', Auth::id()) }}" method="POST">--}}
{{--               @method('PUT')--}}
{{--               @csrf--}}
{{--               <div class="form-group">--}}
{{--                   <label for="exampleInputLogin">Old password</label>--}}
{{--                   <input type="text" class="form-control" name="old_password" placeholder="Old password">--}}
{{--               </div>--}}
{{--               <div class="form-group">--}}
{{--                   <label for="exampleInputLogin">New password</label>--}}
{{--                   <input type="text" class="form-control" name="password" placeholder="New password">--}}
{{--               </div>--}}
{{--               <div class="form-group">--}}
{{--                   <label for="exampleInputLogin">New password_2</label>--}}
{{--                   <input type="text" class="form-control" name="password_confirmation" placeholder="New password_2">--}}
{{--               </div>--}}
{{--               <button type="submit" class="btn btn-primary">update password</button>--}}
{{--           </form>--}}
{{--       </div>--}}

{{--    </div>--}}


@endsection


