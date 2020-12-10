@extends('layouts.app')

@section('content')



    <section class="auth" style="height: 52vh">
        <div class="container">
            <auth-register-component
                    :translate="{{ json_encode(trans('template/modal.auth')) }}"
            />
        </div>
    </section>

@endsection
