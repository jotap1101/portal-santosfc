/* script nav-bar default */

const body = document.querySelector("body");
const header = document.querySelector("header");
const sidebarOpen = document.querySelector(".sidebar-open");
const sidebarClose = document.querySelector(".sidebar-close");

sidebarOpen.addEventListener("click", () => {
    header.classList.add("active-navbar");
});

body.addEventListener("click", e => {
    let clickedElm = e.target;

    if (!clickedElm.classList.contains("sidebar-open") && !clickedElm.classList.contains("menu")) {
        header.classList.remove("active-navbar");
    }
});

window.addEventListener('scroll', function () {
    const header = document.querySelector('header');
    header.classList.toggle('sticky', window.scrollY > 0);
});

var swiper = new Swiper(".mySwiperNoticias", {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        "@0.00": {
            slidesPerView: 1,
            spaceBetween: 10
        },
        "@0.75": {
            slidesPerView: 2,
            spaceBetween: 20
        },
        "@1.00": {
            slidesPerView: 3,
            spaceBetween: 40
        },
        "@1.50": {
            slidesPerView: 4,
            spaceBetween: 50
        },
    },
});

var swiper = new Swiper(".mySwiperConquistas", {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    // autoplay: {
    //     delay: 2500,
    //     disableOnInteraction: false,
    // },
    // navigation: {
    //     nextEl: ".swiper-button-next",
    //     prevEl: ".swiper-button-prev",
    // },
    breakpoints: {
        "@0.00": {
            slidesPerView: 1,
            spaceBetween: 10
        },
        "@0.75": {
            slidesPerView: 2,
            spaceBetween: 20
        },
        "@1.00": {
            slidesPerView: 3,
            spaceBetween: 40
        },
        "@1.50": {
            slidesPerView: 4,
            spaceBetween: 50
        },
    },
});

var swiper = new Swiper(".mySwiperJogadores", {
    slidesPerView: 3,
    spaceBetween: 30,
    // loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
        clickable: true,
    },
    breakpoints: {
        "@0.00": {
            slidesPerView: 1,
            spaceBetween: 10
        },
        "@0.80": {
            slidesPerView: 2,
            spaceBetween: 20
        },
        "@1.00": {
            slidesPerView: 3,
            spaceBetween: 40
        },
        "@1.50": {
            slidesPerView: 3,
            spaceBetween: 50
        },
    },
});

var swiper = new Swiper(".mySwiperVideos", {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        "@0.00": {
            slidesPerView: 1,
            spaceBetween: 10
        },
        "@0.80": {
            slidesPerView: 2,
            spaceBetween: 20
        },
        "@1.00": {
            slidesPerView: 3,
            spaceBetween: 40
        },
        "@1.50": {
            slidesPerView: 3,
            spaceBetween: 50
        },
    },
});