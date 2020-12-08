"use strict";

if (document.querySelector('.myCrutch')) {
  var myCrutch = document.querySelectorAll('.myCrutch');

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
  if (document.querySelector('.mobile_menu')) {
    var header = document.querySelector('.header');
    var btn = document.querySelector('.mobile_menu');
    var menu = document.querySelector('.mobile_menu-form');
    btn.addEventListener('click', function () {
      if (header.classList.contains('active')) {
        header.classList.remove('active');
      } else {
        header.classList.add('active');
      }
    });
    window.addEventListener('click', function (e) {
      if (e.target.closest('.header.active') === null) {
        header.classList.remove('active');
      }
    });
  }

  if (document.querySelector('.development')) {
    var main = document.querySelector('main');
    main.style.paddingTop = 0;
  } // в пользователе октрывается модалка с ключем от игры


  if (document.querySelector('.showCart')) {
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
              modal.classList.remove('d-block');
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
    var text = document.getElementById('showDescription');
    var textInner = text.innerHTML;

    if (text.innerHTML.length > 500) {
      text.innerHTML = text.innerHTML.substr(0, 500) + '</br><span id="showDescriptionClick" style="color:#F59502; cursor: pointer; text-decoration:none;">Learn more...</span>';
      document.getElementById('showDescriptionClick').addEventListener('click', function () {
        document.getElementById('showDescription').innerHTML = textInner;
      });
    }
  }

  if (document.querySelector('.header__user')) {
    var headerUser = document.querySelector('.header__user-item');
    var headerUserMenu = document.querySelector('.header__user-menu');
    headerUser.addEventListener('click', function () {
      if (headerUserMenu.classList.contains('display')) {
        headerUserMenu.classList.remove('display');
        headerUserMenu.style.display = 'none';
        headerUser.classList.remove('active');
      } else {
        headerUserMenu.classList.add('display');
        headerUserMenu.style.display = 'block';
        headerUser.classList.add('active');
      }
    });
    window.addEventListener('click', function (e) {
      if (e.target !== headerUserMenu && e.target.closest('.active') === null) {
        headerUserMenu.classList.remove('display');
        headerUserMenu.style.display = 'none';
        headerUser.classList.remove('active');
      }
    });
  }

  if (document.getElementById('addBalance')) {
    var _btn = document.getElementById('addBalance');

    var _modal = document.querySelector('.balance');

    var _close = _modal.querySelector('.button-close');

    var wrapper = _modal.querySelector('.global-wrap');

    _btn.addEventListener('click', function () {
      _modal.classList.add('d-block');
    });

    _close.addEventListener('click', function () {
      _modal.classList.remove('d-block');
    });

    window.addEventListener('click', function (e) {
      if (e.target === wrapper) {
        _modal.classList.remove('d-block');
      }
    });
  }
});
"use strict";

// main first screen
if (document.querySelector('.swiper-home')) {
  if (window.innerWidth > 992) {
    document.querySelector('.swiper-home_pagination').remove();
    var homeThumbs = new Swiper('.swiper-home_thumbs', {
      spaceBetween: 15,
      slidesPerView: 5,
      loop: true,
      centeredSlides: true,
      slidesPerGroup: 1,
      loopedSlides: 5
    });
    var homeTop = new Swiper('.swiper-home', {
      slidesPerView: 1,
      spaceBetween: 10,
      loopedSlides: 5,
      loop: true,
      // autoHeight: true,
      thumbs: {
        swiper: homeThumbs
      }
    });
    homeTop.update();
    homeThumbs.update();
  } else {
    document.querySelector('.swiper-home_thumbs').remove();

    var _homeTop = new Swiper('.swiper-home', {
      slidesPerView: 1,
      spaceBetween: 10,
      loopedSlides: 5,
      loop: true,
      pagination: {
        el: '.swiper-home_pagination',
        type: 'bullets'
      }
    });

    _homeTop.update();
  }
} // catalog show


if (document.querySelector('.swiper-top')) {
  var galleryThumbs = new Swiper('.swiper-thumbs', {
    spaceBetween: 15,
    slidesPerView: 6,
    loop: true,
    centeredSlides: true,
    slidesPerGroup: 1,
    loopedSlides: 5
  });
  var galleryTop = new Swiper('.swiper-top', {
    slidesPerView: 1,
    spaceBetween: 10,
    loopedSlides: 5,
    loop: true,
    autoHeight: true,
    thumbs: {
      swiper: galleryThumbs
    }
  });
  galleryTop.update();
  galleryThumbs.update();
}