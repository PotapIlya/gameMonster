@if(session('success'))
    <div class="alert success col-xl-12 col-8 px-0 my-4">
        <button class="w-100 success__button">
            {{ session()->get('success') }}
        </button>
    </div>
@endif