@if( $errors->any() )
    <div class="alert error col-6 px-0">
        <ul class="w-100 error__button">
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
