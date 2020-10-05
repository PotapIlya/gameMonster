@extends('layouts.app')

@section('content')
    <div class="container">
       <div class="d-flex justify-content-between col-6">
           <form action="{{ route('user.update', Auth::id()) }}" method="POST">
               @method('PATCH')
               @csrf
               <div class="form-group">
                   <label for="exampleInputLogin">Login</label>
                   <input value="{{ Auth::user()->name }}" type="text" class="form-control" id="exampleInputLogin" aria-describedby="emailHelp" placeholder="login" name="name">
               </div>
               <div class="form-group">
                   <label for="exampleInputEmail1">Email address</label>
                   <input value="{{ Auth::user()->email }}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                   <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
               </div>
               <div class="form-group">
                   <label for="exampleInputPhone">Phone</label>
                   <input value="{{ Auth::user()->phone }}" type="number" class="form-control" id="exampleInputPhone" placeholder="Phone" name="phone">
               </div>
               <button type="submit" class="btn btn-primary">Submit</button>
           </form>

           <form action="{{ route('user.update', Auth::id()) }}" method="POST">
               @method('PUT')
               @csrf
               <div class="form-group">
                   <label for="exampleInputLogin">Old password</label>
                   <input type="text" class="form-control" name="old_password" placeholder="Old password">
               </div>
               <div class="form-group">
                   <label for="exampleInputLogin">New password</label>
                   <input type="text" class="form-control" name="password" placeholder="New password">
               </div>
               <div class="form-group">
                   <label for="exampleInputLogin">New password_2</label>
                   <input type="text" class="form-control" name="password_confirmation" placeholder="New password_2">
               </div>
               <button type="submit" class="btn btn-primary">update password</button>
           </form>
       </div>
    </div>
@endsection
