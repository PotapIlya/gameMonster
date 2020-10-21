document.addEventListener('DOMContentLoaded', () =>
{


    if (document.querySelector('.modal-auth'))
    {
        const modal = document.querySelector('.modal-auth');
        const login = document.querySelectorAll('.openAuth');

        const modalWrap = modal.querySelector('.global-wrap');
        const close = modal.querySelector('.close');

        const modalForgot = document.querySelector('.modal-forgot');
        const forgot = modal.querySelector('.registration__forgot');


        forgot.addEventListener('click', () =>
        {
            const closeBtnWrapper = modalForgot.querySelector('.close')
            const modalWrapWrapper = modal.querySelector('.modal-wrap');

            modal.classList.remove('d-block');
            modalForgot.classList.add('d-block')


            closeBtnWrapper.addEventListener('click', () => {
                modalForgot.classList.remove('d-block')
            })

            window.addEventListener('click', (e) => {
                // console.log(e.target)
                // console.log(modalWrapWrapper)
                if (e.target === modalWrapWrapper )
                {
                    modalForgot.classList.remove('d-block')
                }
            })


        })



        login.forEach(x =>{
            x.addEventListener('click', () => {
                modal.classList.add('d-block')
            })
        })
        window.addEventListener('click', (e) => {
            if (e.target === modalWrap )
            {
                modal.classList.remove('d-block')
            }
        })
        close.addEventListener('click', () => {
            modal.classList.remove('d-block')
        })

    }



    if (document.querySelector('.mobile_menu'))
    {
        const menu =  document.querySelector('.mobile_menu');
        const mobileMenu =  document.querySelector('.mobile_menu-form');

        // if (window.innerWidth < 1366)
        // {
        //     menu.classList.add('mobile_menu-active')
        // }

        menu.addEventListener('click', () => {
            if (menu.classList.contains('mobile_menu-active'))
            {
                menu.classList.remove('mobile_menu-active')
                // mobileMenu.classList.remove('d-flex')
                mobileMenu.style.display = 'none';
            } else{
                menu.classList.add('mobile_menu-active')
                mobileMenu.style.display = 'grid';
            }
        })

    }


    if ( document.querySelector('.header__user'))
    {
        const headerUser = document.querySelector('.header__user')
        const headerUserMenu = document.querySelector('.header__user-menu')

        headerUser.addEventListener('click', () =>
        {
            if (headerUserMenu.classList.contains('display'))
            {
                headerUserMenu.classList.remove('display')
                headerUserMenu.style.display = 'none'
            }
            else{
                headerUserMenu.classList.add('display')
                headerUserMenu.style.display = 'block'
            }
        })
        document.addEventListener('click', (e)=>{
            if (e.target !== headerUser && e.target.parentElement !== headerUser && e.target.parentElement.parentElement !== headerUser){
                headerUserMenu.classList.remove('d-block')
            }
        })
    }


    if (document.querySelector('.header__search-btn'))
    {
        const btn = document.querySelector('.header__search-btn');
        const label = document.querySelector('.header__search-label');
        const input = label.querySelector('input');
        const ul =  document.querySelector('.header__search-res');
        const headerUserMoney =  document.querySelector('.header__user-money');


        // console.log(ul)

        btn.addEventListener('click', () =>
        {
            btn.style.opacity = 0;
            label.classList.add('d-block');
            if (window.innerWidth > 1366)
            {
                headerUserMoney.classList.add('d-none')
            }
            input.focus();
        })

        input.addEventListener('keydown', () => {
            if (input.value)
            {
                // console.log(123)
                ul.classList.add('d-block')
            }
        })

        // window.addEventListener('click', (e)=>{
        //     console.log()
        //     if (e.target !== label){
        //
        //         console.log(123)
        //
        //         // input.value = ''
        //         // label.classList.remove('d-block');
        //         // ul.classList.remove('d-block')
        //
        //     }
        // })


    }



    if ( document.querySelector('.searchInput') )
    {
        const input = document.querySelector('.searchInput');
        const headerSearch  = document.querySelector('.header__search');
        const money = document.querySelector('.header__money');
        const ul = document.querySelector('.header__search-res');

        // input.addEventListener('focus', () => {
        //     money.style.display = 'none'
        //     input.parentElement.classList.add('header__search-active')
        // })
        input.addEventListener('keydown', () => {
            if (input.value)
            {
                ul.classList.add('d-block')
            }
        })
        window.addEventListener('click', (e)=>{
            if (e.target !== input){
                input.value = ''
                input.parentElement.classList.remove('header__search-active')
                ul.classList.remove('d-block')
                money.style.display = 'block'
            }
        })


    }



    if (document.querySelector('.development'))
    {
        const main = document.querySelector('main');

        main.style.paddingTop = 0;
    }







})






