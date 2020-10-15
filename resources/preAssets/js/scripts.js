// require('./Modal')
// require('./_scripts')
// require('./_swiper')
"use strict";
"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var Modal = /*#__PURE__*/function () {
  function Modal() {
    _classCallCheck(this, Modal);

    this.modal = document.querySelectorAll('.modal');
    this.buttons = document.querySelectorAll('.openModal');
    this.searchModal();
  }

  _createClass(Modal, [{
    key: "searchModal",
    value: function searchModal() {
      var _this = this;

      this.buttons.forEach(function (btn) {
        btn.addEventListener('click', function () {
          if (document.querySelector("div[data-type=".concat(btn.dataset.type, "]"))) {
            _this.modal = document.querySelector("div[data-type=".concat(btn.dataset.type, "]"));
            _this.close = _this.modal.querySelector('.close');
            _this.wrapper = _this.modal.querySelector('.modal-wrap');

            _this.openModal();

            _this.closeModal();
          } // window.addEventListener('click', (e) =>{
          //     if (e.target !== this.wrapper)
          //     {
          //         console.log(123)
          //     }
          // })

        });
      });
    }
  }, {
    key: "openModal",
    value: function openModal() {
      this.modal.classList.add('d-block');
    }
  }, {
    key: "closeModal",
    value: function closeModal() {
      var _this2 = this;

      // if (this.close)
      // {
      this.close.addEventListener('click', function () {
        _this2.modal.classList.remove('d-block');
      }); // }
    }
  }]);

  return Modal;
}();

new Modal('potap');
"use strict";

document.addEventListener('DOMContentLoaded', function () {
  if (document.querySelector('.modal-auth')) {
    var modal = document.querySelector('.modal-auth');
    var login = document.querySelectorAll('.openAuth');
    var modalWrap = modal.querySelector('.global-wrap');
    var close = modal.querySelector('.close');
    var modalForgot = document.querySelector('.modal-forgot');
    var forgot = modal.querySelector('.registration__forgot');
    forgot.addEventListener('click', function () {
      var closeBtnWrapper = modalForgot.querySelector('.close');
      var modalWrapWrapper = modal.querySelector('.modal-wrap');
      modal.classList.remove('d-block');
      modalForgot.classList.add('d-block');
      closeBtnWrapper.addEventListener('click', function () {
        modalForgot.classList.remove('d-block');
      });
      window.addEventListener('click', function (e) {
        // console.log(e.target)
        // console.log(modalWrapWrapper)
        if (e.target === modalWrapWrapper) {
          modalForgot.classList.remove('d-block');
        }
      });
    });
    login.forEach(function (x) {
      x.addEventListener('click', function () {
        modal.classList.add('d-block');
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
  }

  if (document.querySelector('.mobile_menu')) {
    var menu = document.querySelector('.mobile_menu');
    var mobileMenu = document.querySelector('.mobile_menu-form'); // if (window.innerWidth < 1366)
    // {
    //     menu.classList.add('mobile_menu-active')
    // }

    menu.addEventListener('click', function () {
      if (menu.classList.contains('mobile_menu-active')) {
        menu.classList.remove('mobile_menu-active'); // mobileMenu.classList.remove('d-flex')

        mobileMenu.style.display = 'none';
      } else {
        menu.classList.add('mobile_menu-active');
        mobileMenu.style.display = 'grid';
      }
    });
  }

  if (document.querySelector('.header__user')) {
    var headerUser = document.querySelector('.header__user');
    var headerUserMenu = document.querySelector('.header__user-menu');
    headerUser.addEventListener('click', function () {
      if (headerUserMenu.classList.contains('display')) {
        headerUserMenu.classList.remove('display');
        headerUserMenu.style.display = 'none';
      } else {
        headerUserMenu.classList.add('display');
        headerUserMenu.style.display = 'block';
      }
    });
    document.addEventListener('click', function (e) {
      if (e.target !== headerUser && e.target.parentElement !== headerUser && e.target.parentElement.parentElement !== headerUser) {
        headerUserMenu.classList.remove('d-block');
      }
    });
  }

  if (document.querySelector('.header__search-btn')) {
    var btn = document.querySelector('.header__search-btn');
    var label = document.querySelector('.header__search-label');
    var input = label.querySelector('input');
    var ul = document.querySelector('.header__search-res');
    var headerUserMoney = document.querySelector('.header__user-money'); // console.log(ul)

    btn.addEventListener('click', function () {
      btn.style.opacity = 0;
      label.classList.add('d-block');

      if (window.innerWidth > 1366) {
        headerUserMoney.classList.add('d-none');
      }

      input.focus();
    });
    input.addEventListener('keydown', function () {
      if (input.value) {
        // console.log(123)
        ul.classList.add('d-block');
      }
    }); // window.addEventListener('click', (e)=>{
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

  if (document.querySelector('.searchInput')) {
    var _input = document.querySelector('.searchInput');

    var headerSearch = document.querySelector('.header__search');
    var money = document.querySelector('.header__money');

    var _ul = document.querySelector('.header__search-res'); // input.addEventListener('focus', () => {
    //     money.style.display = 'none'
    //     input.parentElement.classList.add('header__search-active')
    // })


    _input.addEventListener('keydown', function () {
      if (_input.value) {
        _ul.classList.add('d-block');
      }
    });

    window.addEventListener('click', function (e) {
      if (e.target !== _input) {
        _input.value = '';

        _input.parentElement.classList.remove('header__search-active');

        _ul.classList.remove('d-block');

        money.style.display = 'block';
      }
    });
  }

  if (document.querySelector('.development')) {
    var main = document.querySelector('main');
    main.style.paddingTop = 0;
  }

  if (document.querySelector('.myCrutch')) {
    var myCrutch = document.querySelectorAll('.myCrutch');

    var xx = function xx() {
      myCrutch.forEach(function (x) {
        if (x.clientHeight > 0) {
          x.parentElement.style.height = x.clientHeight + 'px';
        }
      });
    };

    var i = 0;
    var interval = setInterval(function () {
      xx();
      myCrutch.forEach(function (x) {
        if (x.clientHeight > 0) {
          i++;
        }
      });

      if (i < myCrutch.length) {
        i = 0;
      } else if (i === myCrutch.length) {
        clearInterval(interval);
      }
    }, 100);
    setTimeout(function () {
      xx();
    }, 1000);
    window.addEventListener('resize', function () {
      xx();
    });
  }
});
"use strict";

var _swiperBundle = _interopRequireDefault(require("swiper/swiper-bundle.min"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

/** HOME **/
if (document.querySelector('.swiper-top')) {
  var galleryThumbs = new _swiperBundle["default"]('.swiper-thumbs', {
    spaceBetween: 15,
    slidesPerView: 6,
    loop: true,
    centeredSlides: true,
    slidesPerGroup: 1,
    loopedSlides: 5
  });
  var galleryTop = new _swiperBundle["default"]('.swiper-top', {
    slidesPerView: 1,
    spaceBetween: 10,
    loopedSlides: 5,
    loop: true,
    thumbs: {
      swiper: galleryThumbs
    }
  });
  galleryTop.update();
  galleryThumbs.update();
}

if (document.querySelector('.swiper-home')) {
  // console.log(window.innerWidth)
  if (window.innerWidth > 992) {
    document.querySelector('.swiper-home_pagination').remove();
    var homeThumbs = new _swiperBundle["default"]('.swiper-home_thumbs', {
      spaceBetween: 15,
      slidesPerView: 5,
      loop: true,
      centeredSlides: true,
      slidesPerGroup: 1,
      loopedSlides: 5
    });
    var homeTop = new _swiperBundle["default"]('.swiper-home', {
      slidesPerView: 1,
      spaceBetween: 10,
      loopedSlides: 5,
      loop: true,
      thumbs: {
        swiper: homeThumbs
      }
    });
    homeTop.update();
    homeThumbs.update();
  } else {
    document.querySelector('.swiper-home_thumbs').remove();

    var _homeTop = new _swiperBundle["default"]('.swiper-home', {
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
}