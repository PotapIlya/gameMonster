let homeItemSmall = document.querySelectorAll('.home__item-small');
let firstLeft = 55;
let width = firstLeft;
for (let i = 0; i < homeItemSmall.length; i++) {
    if (i < 1) {
        homeItemSmall[i].style.left = firstLeft + 'px';
    } else if (i >= 1) {
        width += homeItemSmall[i].clientWidth + 30;
        homeItemSmall[i].style.left = width + 'px';
    }
}
let catalogPrice = document.querySelectorAll('.catalog__price');
for (let j = 0; j < catalogPrice.length; j++) {
    let neww = catalogPrice[j].querySelector('.new');
    let old = catalogPrice[j].querySelector('.old');
    if (old.textContent == '') {
        catalogPrice[j].style.bottom = '15px';
    }
}
let newsThumb = document.querySelectorAll('.news__thumb');
let newsThumbBlock = document.querySelector('.news__thumb-block');
let newsThumbMedium = document.querySelector('.news__thumb-medium');
let newsItem5 = document.querySelector('.news__item_5');
let heightNewsItem5 = newsItem5.clientHeight;
let positionTop = 0;
let allNewsThumbHeight = 0;
for (let j = 0; j < newsThumb.length; j++) {
    if (j < 1) {
        newsThumbBlock.style.top = heightNewsItem5 + 29 + 'px';
    } else if (j >= 1) {
        positionTop += newsThumb[j].clientHeight + 21;
        newsThumb[j].style.top = positionTop + 'px';
    }
    allNewsThumbHeight = allNewsThumbHeight + newsThumb[j].clientHeight + 21;
    newsThumbMedium.style.top = allNewsThumbHeight + heightNewsItem5 + 25 + 'px';
}


const images = document.querySelectorAll('.homeItemCart');
const item = document.getElementById('mainImage');

images.forEach(image =>{
    image.addEventListener('click', () =>
    {
        let src = image.querySelector('img').getAttribute('src')
        item.innerHTML = `<img width="700px" class="home__item-img" src="${src}" alt=""/>`
    })
})











