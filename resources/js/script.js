if (document.querySelector('.myCrutch'))
{

    const myCrutch = document.querySelectorAll('.myCrutch');

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



document.addEventListener('DOMContentLoaded', () =>
{


    if (document.querySelector('.mobile_menu'))
    {
        const header = document.querySelector('.header');
        const btn = document.querySelector('.mobile_menu');
        const menu = document.querySelector('.mobile_menu-form');

        btn.addEventListener('click', () => {
            if ( header.classList.contains('active') )
            {
                header.classList.remove('active')
            } else{
                header.classList.add('active')
            }
        })
    }




    if (document.querySelector('.development'))
    {
        const main = document.querySelector('main');

        main.style.paddingTop = 0;
    }

    // в пользователе октрывается модалка с ключем от игры
    if (document.querySelector('.showCart'))
    {
        const showCarts = document.querySelectorAll('.showCart');

        const email = document.getElementById('formEmail');

        const modal = document.querySelector('.modal.modal-key');
        const modalWrap = modal.querySelector('.global-wrap')
        const modalTitle = modal.querySelector('#modalTitle');
        const modalEmail = modal.querySelector('#modalEmail');
        const modalKey = modal.querySelector('#modalKey');
        const close = modal.querySelector('.close')

        showCarts.forEach(cart => {
            cart.addEventListener('click', () => {
                const key = cart.dataset.key;
                const title = cart.parentElement.querySelector('.catalog__title').textContent;

                modal.classList.add('d-block')

                modalTitle.textContent = title;
                modalEmail.value = email.value;
                modalKey.value = key;

                const btnsCash = modal.querySelectorAll('.getCash')
                btnsCash.forEach(cash => {
                    cash.addEventListener('click', () => {
                        if (modal.classList.contains('d-block')) {
                            const input = cash.parentElement.querySelector('input');
                            input.removeAttribute('disabled');

                            input.select();
                            document.execCommand("copy");

                            input.setAttribute('disabled', 'disabled');
                        }
                    })
                })

                window.addEventListener('click', (e) => {
                    if (e.target === modalWrap) {
                        modal.classList.remove('d-block')
                    }
                })
                close.addEventListener('click', () => {
                    modal.classList.remove('d-block')
                })
            })
        })
    }

// в кариточке кнопка подробнее
    if (document.getElementById('showDescription'))
    {
        const text = document.getElementById('showDescription');
        const textInner = text.innerHTML;

        if (text.innerHTML.length > 500)
        {
            text.innerHTML = text.innerHTML.substr(0, 500) + '</br><span id="showDescriptionClick" style="color:#F59502; cursor: pointer; text-decoration:none;">Подробнее...</span>';

            document.getElementById('showDescriptionClick').addEventListener('click', () =>
            {
                document.getElementById('showDescription').innerHTML = textInner;
            });
        }
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

                // document.addEventListener('click', (e)=>{
                //     if (e.target !== headerUser && e.target.parentElement !== headerUser && e.target.parentElement.parentElement !== headerUser){
                //         headerUserMenu.classList.remove('d-block')
                //     }
                // })
            }
        })

    }

    if (document.getElementById('addBalance'))
    {
        const btn = document.getElementById('addBalance')
        const modal = document.querySelector('.balance');
        const close = modal.querySelector('.button-close');
        const wrapper = modal.querySelector('.global-wrap');

        btn.addEventListener('click', () => {
            modal.classList.add('d-block');
        });
        close.addEventListener('click', () => {
            modal.classList.remove('d-block');
        });
        window.addEventListener('click', (e) => {
            if (e.target === wrapper) {
                modal.classList.remove('d-block');
            }
        })
    }




// if (document.querySelector('.modal'))
// {
//     const modal = document.querySelector('.modal-key')
//     const open = document.getElementById('key');
//
//     const modalWrap = modal.querySelector('.global-wrap')
//     const close = modal.querySelector('.close')
//
//     const btnsCash = modal.querySelectorAll('.getCash')
//
//     btnsCash.forEach(cash =>{
//         cash.addEventListener('click', () => {
//             if (modal.classList.contains('d-block'))
//             {
//                 const input = cash.parentElement.querySelector('input');
//                 input.removeAttribute('disabled');
//
//                 input.select();
//                 document.execCommand("copy");
//
//                 input.setAttribute('disabled', 'disabled');
//             }
//         })
//     })
//
//
//     open.addEventListener('click', () => {
//         modal.classList.add('d-block')
//     })
//
//     window.addEventListener('click', (e) => {
//         if (e.target === modalWrap )
//         {
//             modal.classList.remove('d-block')
//         }
//     })
//     close.addEventListener('click', () => {
//         modal.classList.remove('d-block')
//     })
//
// }











});