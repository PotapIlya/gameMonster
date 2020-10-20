const showCarts = document.querySelectorAll('.showCart');
const email = document.getElementById('formEmail');

const modal = document.querySelector('.modal.modal-key');
const modalWrap = modal.querySelector('.global-wrap')
const modalTitle = modal.querySelector('#modalTitle');
const modalEmail = modal.querySelector('#modalEmail');
const modalKey = modal.querySelector('#modalKey');
const close = modal.querySelector('.close')

showCarts.forEach(cart => {
    cart.addEventListener('click', () =>
    {
        const key = cart.dataset.key;
        const title = cart.parentElement.querySelector('.catalog__title').textContent;


        modal.classList.add('d-block')

        modalTitle.textContent = title;
        modalEmail.value = email.value;
        modalKey.value = key;




        const btnsCash = modal.querySelectorAll('.getCash')
        btnsCash.forEach(cash =>{
            cash.addEventListener('click', () => {
                if (modal.classList.contains('d-block'))
                {
                    const input = cash.parentElement.querySelector('input');
                    input.removeAttribute('disabled');

                    input.select();
                    document.execCommand("copy");

                    input.setAttribute('disabled', 'disabled');
                }
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


    })
})




let text = document.getElementById('showDescription');
let textInner = text.innerHTML;


text.innerHTML = text.innerHTML.substr(0, 500)+'</br><span onclick="showText()" style="color:#F59502; cursor: pointer; text-decoration:none;">Подробнее..</span>';

function showText()
{
    document.getElementById('showDescription').innerHTML = textInner;
}












if (document.querySelector('.modal'))
{
    const modal = document.querySelector('.modal-key')
    const open = document.getElementById('key');

    const modalWrap = modal.querySelector('.global-wrap')
    const close = modal.querySelector('.close')

    const btnsCash = modal.querySelectorAll('.getCash')

    btnsCash.forEach(cash =>{
        cash.addEventListener('click', () => {
            if (modal.classList.contains('d-block'))
            {
                const input = cash.parentElement.querySelector('input');
                input.removeAttribute('disabled');

                input.select();
                document.execCommand("copy");

                input.setAttribute('disabled', 'disabled');
            }
        })
    })


    open.addEventListener('click', () => {
        modal.classList.add('d-block')
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