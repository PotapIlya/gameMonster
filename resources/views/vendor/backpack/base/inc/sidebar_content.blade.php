<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>



{{--<li class='nav-item'><a class='nav-link' href='{{ backpack_url('news') }}'><i class='nav-icon la la-question'></i> News</a></li>--}}

{{--<li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>--}}


<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-file-o"></i>Блоки</a>
    <ul class="nav-dropdown-items">

        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('slider') }}'><i class='nav-icon la la-file-o'></i> Слайдер</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('lick') }}'><i class='nav-icon la la-file-o'></i> Licks</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('proposal') }}'><i class='nav-icon la la-file-o'></i> Proposals</a></li>
    </ul>
</li>


<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-files-o"></i>Каталог</a>
    <ul class="nav-dropdown-items">

        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('catalog') }}'><i class='nav-icon la la-shopping-cart'></i> Товары</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('catalogkey') }}'><i class='nav-icon la la-key'></i> Ключи</a></li>
        <li class='nav-title'>
            <hr>
        </li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('category') }}'><i class='nav-icon la la-file-o'></i> Категории</a></li>

        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('developers') }}'><i class='nav-icon la la-file-o'></i> Разработчики</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('languages') }}'><i class='nav-icon la la-file-o'></i> Языки</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('operatingsystem') }}'><i class='nav-icon la la-file-o'></i> ОС</a></li>
    </ul>
</li>




<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-user"></i>Пользователи</a>
    <ul class="nav-dropdown-items">

        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('users') }}'><i class='nav-icon la la-group'></i> Пользователи</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('historypayments') }}'><i class='nav-icon la la-info-circle'></i> Пополнения</a></li>

        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('buykey') }}'><i class='nav-icon la la-info-circle'></i> Покупки</a></li>

    </ul>
</li>






<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-cog"></i>Общее</a>
    <ul class="nav-dropdown-items">

        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('nav') }}'><i class='nav-icon la la-list'></i> Меню</a></li>

        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('socialnetworks') }}'><i class='nav-icon la la-file-o'></i> Соц сети</a></li>
    </ul>
</li>
