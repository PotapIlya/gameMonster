"use strict";

console.log(123);

if (document.querySelector('.myCrutch')) {
  var myCrutch = document.querySelectorAll('.myCrutch');
  console.log(myCrutch);

  var xx = function xx() {
    myCrutch.forEach(function (x) {
      if (x.clientHeight > 0) {
        x.parentElement.style.height = x.clientHeight + 'px';
      }
    });
  };

  xx();
  setTimeout(function () {
    xx();
  }, 500);
  window.addEventListener('resize', function () {
    xx();
  });
}

document.addEventListener('DOMContentLoaded', function () {
  if (document.querySelector('.development')) {
    var main = document.querySelector('main');
    main.style.paddingTop = 0;
  } // в пользователе октрывается модалка с ключем от игры


  if (document.querySelectorAll('.showCart')) {
    var showCarts = document.querySelectorAll('.showCart');
    var email = document.getElementById('formEmail');
    var modal = document.querySelector('.modal.modal-key');
    var modalWrap = modal.querySelector('.global-wrap');
    var modalTitle = modal.querySelector('#modalTitle');
    var modalEmail = modal.querySelector('#modalEmail');
    var modalKey = modal.querySelector('#modalKey');
    var close = modal.querySelector('.close');
    showCarts.forEach(function (cart) {
      cart.addEventListener('click', function () {
        var key = cart.dataset.key;
        var title = cart.parentElement.querySelector('.catalog__title').textContent;
        modal.classList.add('d-block');
        modalTitle.textContent = title;
        modalEmail.value = email.value;
        modalKey.value = key;
        var btnsCash = modal.querySelectorAll('.getCash');
        btnsCash.forEach(function (cash) {
          cash.addEventListener('click', function () {
            if (modal.classList.contains('d-block')) {
              var input = cash.parentElement.querySelector('input');
              input.removeAttribute('disabled');
              input.select();
              document.execCommand("copy");
              input.setAttribute('disabled', 'disabled');
            }
          });
        });
        window.addEventListener('click', function (e) {
          if (e.target === modalWrap) {
            modal.classList.remove('d-block');
          }
        });
        close.addEventListener('click', function () {
          modal.classList.remove('d-block');
        });
      });
    });
  } // в кариточке кнопка подробнее


  if (document.getElementById('showDescription')) {
    var showText = function showText() {
      document.getElementById('showDescription').innerHTML = textInner;
    };

    var text = document.getElementById('showDescription');
    var textInner = text.innerHTML;
    text.innerHTML = text.innerHTML.substr(0, 500) + '</br><span onclick="showText()" style="color:#F59502; cursor: pointer; text-decoration:none;">Подробнее..</span>';
  } // if (document.querySelector('.modal'))
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