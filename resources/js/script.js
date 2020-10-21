document.addEventListener('DOMContentLoaded', () => {


if (document.querySelector('.development'))
{
    const main = document.querySelector('main');

    main.style.paddingTop = 0;
}

// в пользователе октрывается модалка с ключем от игры
if (document.querySelectorAll('.showCart'))
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
    if (document.getElementById('showDescription')) {
        let text = document.getElementById('showDescription');
        let textInner = text.innerHTML;

        text.innerHTML = text.innerHTML.substr(0, 500) + '</br><span onclick="showText()" style="color:#F59502; cursor: pointer; text-decoration:none;">Подробнее..</span>';

        function showText() {
            document.getElementById('showDescription').innerHTML = textInner;
        }
    }

//
// // AJAX REGISTER AND LOGIN (ROUTE: /REGISTER /LOGIN)
//
//     if (document.querySelector('.auth')) {
//         const axios = require('axios').default;
//
//         const wrapper = document.querySelector('.auth');
//         const form = document.querySelector('form');
//         const url  = '/login';
//
//         const email = form.querySelector('#email');
//         const password = form.querySelector('#password');
//
//         const errorEmail = [];
//         const errorPassword = [];
//
//
//
//         const liErrorEmail = wrapper.querySelector('#errorEmail');
//
//
//         form.addEventListener('submit', (event) => {
//             event.preventDefault();
//
//             axios.post(url, {
//                 email: email,
//                 password: password,
//             })
//
//             .then(response =>
//             {
//                 console.log(response.data)
//
//                 if (response.data.success)
//                 {
//
//                 }
//
//                 if (response.data.errors)
//                 {
//                     if (response.data.errors.email){
//                         errorsEmail(response.data.errors.email)
//                     }
//                     if (response.data.errors.password){
//
//                     }
//                 }
//
//             })
//             .catch(error =>
//             {
//                 console.log(error)
//             })
//
//             const errorsEmail = (error) => {
//                 errorEmail.length = 0;
//                 liErrorEmail.inn
//                 errorEmail.push(error)
//
//                 errorEmail.forEach(error =>{
//                     liErrorEmail.append('pdoawdaw')
//                 })
//
//             }
//
//             const errorsPassword = (error) => {
//
//             }
//
//         })
//
//     }








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