@extends('layouts.app')

@section('content')



    <section class="auth">
        <div class="container">

            <div class="modal modal-auth d-block" style="position: relative; background:transparent;">
                <div class="global-wrap" style="height: 48vh">
                    <div class="modal-wrap">

                        <form method="POST" class="registration d-flex flex-column" style="background:transparent;">
                            @csrf
                            <div class="registration__buttons d-flex justify-content-sm-start justify-content-center mb-3">
                                <a href="{{ route('login') }}" class="registration__sign-in">Вход</a>
                                <a href="{{ route('register') }}" class="registration__sign-up modal_header_active_text">Регистрация</a>
                            </div>


                            <label for="" class="modal-auth-input">
                                <input
                                        name="email"
                                        placeholder="Email"
                                        type="text"
                                        value="{{ old('email') }}"
                                >
                                <span class="modal-auth-span">Email</span>
                            </label>

                            <label for="" class="modal-auth-input">
                                <input
                                        name="password"
                                        placeholder="Password"
                                        type="password"
                                >
                                <span class="modal-auth-span">Пароль</span>
                            </label>
                            <label for="" class="modal-auth-input">
                                <input
                                        name="password_confirmation"
                                        placeholder="Password"
                                        type="password"
                                >
                                <span class="modal-auth-span">Повторите пароль</span>
                            </label>



                            <div class="forgot d-flex align-items-center">
                                <button type="submit" class="registration__enter">Войти</button>
                                <a href="#" class="registration__forgot">Забыли пароль?</a>
                            </div>
                            <a href="#" class="registration__enter-help">Войти с помощью</a>
                            <div class="registration__services d-flex align-items-center">
                                <a href="#" class="service1"><img src="../img/services/steam.png" alt="steam"></a>
                                <a href="#" class="service2 mr-2 ml-4"><img src="../img/services/google.png" alt="google"></a>
                                <a href="#" class="service3 mr-4 ml-2"><img src="../img/services/vk.png" alt="vk"></a>
                                <a href="#" class="service4"><img src="../img/services/facebook.png" alt="facebook"></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

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
{{--                                    {{ __('Register') }}--}}
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
