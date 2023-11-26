function showDiv(caller) {
    if (caller.id === 'goleiros') {
        $("#div-goleiros").attr("style", "display: block");
        $("#div-zagueiros").attr("style", "display: none");
        $("#div-laterais").attr("style", "display: none");
        $("#div-volantes").attr("style", "display: none");
        $("#div-meio-campo").attr("style", "display: none");
        $("#div-atacantes").attr("style", "display: none");
    } else if (caller.id === 'zagueiros') {
        $("#div-goleiros").attr("style", "display: none");
        $("#div-zagueiros").attr("style", "display: block");
        $("#div-laterais").attr("style", "display: none");
        $("#div-volantes").attr("style", "display: none");
        $("#div-meio-campo").attr("style", "display: none");
        $("#div-atacantes").attr("style", "display: none");
    } else if (caller.id === 'laterais') {
        $("#div-goleiros").attr("style", "display: none");
        $("#div-zagueiros").attr("style", "display: none");
        $("#div-laterais").attr("style", "display: block");
        $("#div-volantes").attr("style", "display: none");
        $("#div-meio-campo").attr("style", "display: none");
        $("#div-atacantes").attr("style", "display: none");
    } else if (caller.id === 'volantes') {
        $("#div-goleiros").attr("style", "display: none");
        $("#div-zagueiros").attr("style", "display: none");
        $("#div-laterais").attr("style", "display: none");
        $("#div-volantes").attr("style", "display: block");
        $("#div-meio-campo").attr("style", "display: none");
        $("#div-atacantes").attr("style", "display: none");
    } else if (caller.id === 'meio-campo') {
        $("#div-goleiros").attr("style", "display: none");
        $("#div-zagueiros").attr("style", "display: none");
        $("#div-laterais").attr("style", "display: none");
        $("#div-volantes").attr("style", "display: none");
        $("#div-meio-campo").attr("style", "display: block");
        $("#div-atacantes").attr("style", "display: none");
    } else if (caller.id === 'atacantes') {
        $("#div-goleiros").attr("style", "display: none");
        $("#div-zagueiros").attr("style", "display: none");
        $("#div-laterais").attr("style", "display: none");
        $("#div-volantes").attr("style", "display: none");
        $("#div-meio-campo").attr("style", "display: none");
        $("#div-atacantes").attr("style", "display: block");
    }
}

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    // loop: true,
    // pagination: {
    //     el: ".swiper-pagination",
    //     clickable: true,
    // },
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
            slidesPerView: 3,
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

// const imageProfile = document.querySelector("#image-profile");
// const accountBox = document.querySelector('.account-box');

// imageProfile.addEventListener('click', () => {
//     accountBox.classList.toggle('active');
// });

// const card = document.querySelector(".card__inner");

// card.addEventListener("click", function (e) {
//     card.classList.toggle('is-flipped');
// });