
// import Swiper from '~'
// import Swiper from '../../../../node_modules/swiper/swiper-bundle.min'
//
import Swiper from "swiper/swiper-bundle.min";
// require('../../node_modules/swiper/swiper-bundle.min')



/** HOME **/
if (document.querySelector('.swiper-top')){
    const galleryThumbs = new Swiper('.swiper-thumbs', {
        spaceBetween: 15,
        slidesPerView: 6,
        loop: true,
        centeredSlides: true,
        slidesPerGroup: 1,
        loopedSlides: 5,
    });
    const galleryTop = new Swiper('.swiper-top', {
        slidesPerView: 1,
        spaceBetween: 10,
        loopedSlides: 5,
        loop:true,
        thumbs: {
            swiper: galleryThumbs,
        },
    });
    galleryTop.update();
    galleryThumbs.update();
}




if (document.querySelector('.swiper-home')){
    // console.log(window.innerWidth)
    if (window.innerWidth > 992){
        document.querySelector('.swiper-home_pagination').remove()
        const homeThumbs = new Swiper('.swiper-home_thumbs', {
            spaceBetween: 15,
            slidesPerView: 5,
            loop: true,
            centeredSlides: true,
            slidesPerGroup: 1,
            loopedSlides: 5,

        });
        const homeTop = new Swiper('.swiper-home', {
            slidesPerView: 1,
            spaceBetween: 10,
            loopedSlides: 5,
            loop:true,
            thumbs: {
                swiper: homeThumbs,
            },
        });
        homeTop.update();
        homeThumbs.update();
    }else{
        document.querySelector('.swiper-home_thumbs').remove()
        const homeTop = new Swiper('.swiper-home', {
            slidesPerView: 1,
            spaceBetween: 10,
            loopedSlides: 5,
            loop:true,
            pagination: {
                el: '.swiper-home_pagination',
                type: 'bullets',
            },
        });
        homeTop.update();
    }
}




