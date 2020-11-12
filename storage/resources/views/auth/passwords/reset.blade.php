@extends('layouts.app')

@section('content')



    <div class="modal d-block" style="position: relative; background:transparent;">
        <div class="global-wrap" style="height: 48vh">
            <div class="modal-wrap">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        <h1>
                            {{ session('status') }}
                        </h1>
                    </div>
                @endif

                <form
                        action="{{ route('password.update') }}"
                        method="POST"
                        class="registration d-flex flex-column"
                        style="background: transparent;">

                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="registration__buttons d-flex flex-column justify-content-sm-start justify-content-center mb-3">
                        <span class="registration__sign-in">
                            Смена пароля
                        </span>
                    </div>

                    <label for="" class="modal-auth-input">
                        <input value="{{ old('email') }}" name="email" placeholder="Email" type="text" autofocus required>
                        <span class="modal-auth-span">Email</span>

                        @error('email')
                        <span class="invalid-feedback d-block my-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </label>

                    <label for="" class="modal-auth-input">
                        <input name="password" placeholder="Password" type="password" required>
                        <span class="modal-auth-span">Password</span>

                        @error('password')
                        <span class="invalid-feedback d-block my-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </label>
                    <label for="" class="modal-auth-input">
                        <input name="password_confirmation" placeholder="Password confirmation" type="password" required>
                        <span class="modal-auth-span">Password confirmation</span>
                    </label>

                    <div class="forgot d-flex align-items-center">
                        <button style="color: #fff; cursor: pointer" type="submit" class="registration__enter">Сменить пароль</button>
                    </div>
                </form>

            </div>
        </div>
    </div>




{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Reset Password') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('password.update') }}">--}}
{{--                        @csrf--}}

{{--                        <input type="hidden" name="token" value="{{ $token }}">--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Reset Password') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
