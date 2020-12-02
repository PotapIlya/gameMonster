@if( $errors->any() )
    <div class="alert error col px-0">
        <ul class="w-100 ">
            @foreach($errors->all() as $error)
                <li class="button error__button">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif