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
                            @lang('template/modal.auth.resetTitle')
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
                        <input name="password" placeholder="{{ trans('template/modal.auth.resetPassword') }}" type="password" required>
                        <span class="modal-auth-span">@lang('template/modal.auth.resetPassword')</span>

                        @error('password')
                        <span class="invalid-feedback d-block my-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </label>
                    <label for="" class="modal-auth-input">
                        <input name="password_confirmation" placeholder="{{ trans('template/modal.auth.resetPasswordReset') }}" type="password" required>
                        <span class="modal-auth-span">@lang('template/modal.auth.resetPasswordReset')</span>
                    </label>

                    <div class="forgot d-flex align-items-center">
                        <button style="color: #fff; cursor: pointer" type="submit" class="registration__enter mr-auto">
                            @lang('template/modal.auth.resetBtnPassword')
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
