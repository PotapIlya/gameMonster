
<script>
    if (document.querySelector('.myCrutch'))
    {
        const myCrutch = document.querySelectorAll('.myCrutch')
        let xx = () =>{
            myCrutch.forEach(x =>
            {
                if (x.clientHeight > 0)
                {
                    x.parentElement.style.height = x.clientHeight+'px'
                }
            })
        }
        xx()

        setTimeout(() =>{
            xx()
        }, 500)
        window.addEventListener('resize', () =>{
            xx();
        })
    }
</script>
<header class="header">
    <div class="container px-2 px-xl-0">
        <div class="d-flex align-items-center justify-content-between header__block">


            <div class="d-flex align-items-center mr-0 mr-sm-5">
                <div class="mobile_menu d-xl-none mr-0 mr-sm-1">
                    <div>
                        <span class="d-flex nav-item"></span>
                    </div>

                </div>
                <a href="/" class="header__logo">
                    <img class="" src="/assets/release/img/logo.svg" alt="Game Monster"/>
                </a>
            </div>
            <div class="d-xl-flex flex-row flex-wrap flex-xl-nowrap flex-column flex-xl-row align-items-center justify-content-between w-100 mobile_menu-form">
                <div class="header__translate order-5 order-xl-0 justify-content-end justify-content-sm-start">
                    <input id="en" type="radio" name="translate"/>
                    <label for="en">En</label>
                    <div class="header__inclined">/</div>
                    <input id="ru" type="radio" name="translate" checked="checked"/>
                    <label for="ru" class="activeText">Ru</label>
                </div>
                <ul class="header__list d-flex align-items-start align-items-xl-center flex-column flex-xl-row order-2 order-xl-0 mr-0 mr-xl-5">
                    <li class="header__list-item">
                        <a class="header__list-link" href="#!">
                            Товары
                            <div class="header__list-arrow">
                                <img src="img/arrow-down.svg" alt=""/>
                            </div>
                        </a>
                    </li>
                    <li class="header__list-item"><a class="header__list-link" href="#!">Рулетка</a></li>
                    <li class="header__list-item"><a class="header__list-link" href="#!">Акции</a></li>
                    <li class="header__list-item"><a class="header__list-link" href="#!">Гарантии</a></li>
                    <li class="header__list-item"><a class="header__list-link" href="#!">Контакты</a></li>
                    <li class="header__list-item"><a class="header__list-link gradient__orange-yellow" href="#!">Аренда аккаунтов    </a></li>
                </ul>
                <div class="header__search order-1 order-xl-0 mb-3 mb-xl-0 mb-2 mb-xl-0">
                    <div class="header__search-btn">
                        <button class="button">Поиск</button>
                    </div>

                    <div class="header__search-label ">
                        <input type="text" placeholder="Поиск" class="searchInput"/>
                    </div>

                    <!-- 					<label for="search">Поиск</label> -->
                    <ul class="header__search-res py-2 px-3">

                        <li class="d-flex justify-content-between mb-3">
                            <div class="d-flex align-items-center">
                                <div class="header__search-res-img col-3 mr-2 px-0">
                                    <img class="mw-100" src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" alt="">
                                </div>
                                <div>
                                    <h6 class="header__search-res-title">Witcher 3: Wild Hunt</h6>
                                    <div class="header__search-res-price my-1">
                                        <span class="new mr-1">$ 800</span>
                                        <span class="old">$ 1 200</span>
                                    </div>
                                    <div class="header__search-res-category">
                                        <span>Экшен,</span>
                                        <span>RPG</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <img src="/img/game/steam.svg" alt="">
                            </div>
                        </li>
                        <li class="d-flex justify-content-between mb-3">
                            <div class="d-flex align-items-center">
                                <div class="header__search-res-img col-3 mr-2 px-0">
                                    <img class="mw-100" src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" alt="">
                                </div>
                                <div>
                                    <h6 class="header__search-res-title">Witcher 3: Wild Hunt</h6>
                                    <div class="header__search-res-price my-1">
                                        <span class="new mr-1">$ 800</span>
                                        <span class="old">$ 1 200</span>
                                    </div>
                                    <div class="header__search-res-category">
                                        <span>Экшен,</span>
                                        <span>RPG</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <img src="/img/game/steam.svg" alt="">
                            </div>
                        </li>
                        <li class="d-flex justify-content-between mb-3">
                            <div class="d-flex align-items-center">
                                <div class="header__search-res-img col-3 mr-2 px-0">
                                    <img class="mw-100" src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" alt="">
                                </div>
                                <div>
                                    <h6 class="header__search-res-title">Witcher 3: Wild Hunt</h6>
                                    <div class="header__search-res-price my-1">
                                        <span class="new mr-1">$ 800</span>
                                        <span class="old">$ 1 200</span>
                                    </div>
                                    <div class="header__search-res-category">
                                        <span>Экшен,</span>
                                        <span>RPG</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <img src="/img/game/steam.svg" alt="">
                            </div>
                        </li>


                    </ul>

                </div>

                <div class="header__money order-4 order-xl-0 flex-column mb-2 mb-xl-0">
                    <div class="header__increase-balance d-none d-sm-block d-xl-none">
                        <a href="#" class="mb-2">Пополнить баланс</a>
                    </div>
                    <div class="header__money-currency d-flex align-items-center justify-content-end justify-content-sm-start  pt-3 pt-sm-0">
                        <input id="dollar" type="radio" name="money"/>
                        <label for="dollar">$</label>
                        <input id="euro" type="radio" name="money"/>
                        <label for="euro">€</label>
                        <input id="rub" type="radio" name="money" checked="checked"/>
                        <label for="rub" class="activeText">₽</label>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-end col-4 col-md-3 col-xl-2 px-0">
                <!--				<div class="header__auth">-->
                <!--					<div class="d-none d-xl-flex align-items-center">-->
                <!--						<div class="header__auth-item openAuth">Вход</div>-->
                <!--						<div class="header__inclined mx-1">/</div>-->
                <!--						<div class="header__auth-item openAuth">Регистрация</div>-->
                <!--					</div>-->
                <!--					<div class="d-block d-xl-none">-->
                <!--						<button class="btn_mobile openAuth">Войти</button>-->
                <!--					</div>-->
                <!--				</div>-->
                <div class="header__user d-flex align-items-center">
                    <span class="mr-3 header__user-money">12 976 ₽</span>
                    <div class="d-flex align-items-center">
                        <div>
                            <img class="mw-100" src="/assets/release/img/header/avatar.png" alt="">
                        </div>
                        <div class="header__list-arrow d-none d-sm-block">
                            <img src="img/arrow-down.svg" alt=""/>
                        </div>
                    </div>

                    <ul class="header__user-menu">
                        <li>
                            <a href="/pages/development.php">
                                Пополнить баланс
                            </a>
                        </li>
                        <li>
                            <a href="/pages/my.php">
                                Личный кабинет
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Выйти
                            </a>
                        </li>
                    </ul>

                </div>
            </div>




        </div>
    </div>
</header>