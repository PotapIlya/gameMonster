@extends('layouts.app')

@section('content')



    <section class="auth">
        <div class="container">
            <auth-login-component
                    :translate="{{ json_encode(trans('template/modal.auth')) }}"
            />
        </div>
    </section>

@endsection
