@extends('layouts.app')

@section('content')



    <div class="modal resetEmail d-block" style="position: relative; background:transparent;">
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
                            action="{{ route('password.email') }}"
                            method="POST"
                            class="registration d-flex flex-column"
                            style="background: transparent;">

                        @csrf

                    <div class="registration__buttons d-flex flex-column justify-content-sm-start justify-content-center mb-3">
                        <span class="registration__sign-in">
                            @lang('template/modal.auth.resetTitle')
                        </span>
                        <span class="mt-3 mb-1">
                           @lang('template/modal.auth.resetPubTitle')
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

                    <div class="forgot d-flex align-items-center">
                        <button style="color: #fff; cursor: pointer" type="submit" class="registration__enter mr-auto">
                            @lang('template/modal.auth.resetBtn')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>








{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Reset 3232') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    <form method="POST" action="{{ route('password.email') }}">--}}
{{--                        @csrf--}}

{{--                            <div>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                    @error('email')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
    {{--                        <div class="form-group row">--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Send Password Reset Link') }}--}}
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
