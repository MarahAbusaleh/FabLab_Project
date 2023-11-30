(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();


    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.sticky-top').addClass('bg-white shadow-sm').css('top', '-1px');
        } else {
            $('.sticky-top').removeClass('bg-white shadow-sm').css('top', '-100px');
        }
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Experience
    $('.experience').waypoint(function () {
        $('.progress .progress-bar').each(function () {
            $(this).css("width", $(this).attr("aria-valuenow") + '%');
        });
    }, { offset: '80%' });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


    // Modal Video
    var $videoSrc;
    $('.btn-play').click(function () {
        $videoSrc = $(this).data("src");
    });
    console.log($videoSrc);
    $('#videoModal').on('shown.bs.modal', function (e) {
        $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
    })
    $('#videoModal').on('hide.bs.modal', function (e) {
        $("#video").attr('src', $videoSrc);
    })


    // Testimonial carousel
    // $(".testimonial-carousel").owlCarousel({
    //     autoplay: true,
    //     smartSpeed: 1000,
    //     items: 1,
    //     loop: true,
    //     dots: false,
    //     nav: true,
    //     navText: [
    //         '<i class="bi bi-arrow-left"></i>',
    //         '<i class="bi bi-arrow-right"></i>'
    //     ]
    // });

})(jQuery);

const container = document.querySelector(".slide-container");
const slides = document.querySelectorAll(".slide");
const btns = document.querySelectorAll(".btn");
const btnPrev = document.querySelector(".btn-prev");
const btnNext = document.querySelector(".btn-next");

const n = slides.length;
const angle = 360 / n;

let setId = 0;
let deg = [];
let x = 0;
let y = 0;

const touchDevice = () => "ontouchstart" in document.documentElement;
const setTransition = (time) => {
    let i = 0;
    for (i; i < n; i++) slides[i].style.transition = `all ${time}s`;
};
const positionSlides = () => {
    const r = container.offsetWidth / 2;
    let i = 0;

    setTransition("0");

    for (i; i < n; i++) {
        deg[i] = i * angle;
        x = Math.cos(deg[i] * (Math.PI / 180)) * r + r;
        y = Math.sin(deg[i] * (Math.PI / 180)) * r + r;

        // slides[i].style.top = `${~~y}px`;
        // slides[i].style.left = `${~~x}px`;
    }

    setTimeout(() => {
        setTransition(".3");
    }, 10);
};
const prevSlide = () => {
    let i = 0;
    for (i; i < n; i++) deg[i] -= angle;
    animateSlide();
};
const nextSlide = () => {
    let i = 0;
    for (i; i < n; i++) deg[i] += angle;
    animateSlide();
};
const animateSlide = () => {
    const r = container.offsetWidth / 2;
    let i = 0;

    for (i; i < n; i++) {
        x = Math.cos(deg[i] * (Math.PI / 180)) * r + r;
        y = Math.sin(deg[i] * (Math.PI / 180)) * r + r;

        slides[i].style.top = `${~~y}px`;
        slides[i].style.left = `${~~x}px`;

        y === 0
            ? slides[i].classList.add("active")
            : slides[i].classList.remove("active");
    }

    const activeSlide = document.querySelector(".slide.active");
    // const slideBgImg = getComputedStyle(activeSlide).backgroundImage;

    // container.style.backgroundImage = slideBgImg;
};
const autoPlay = () => (setId = setInterval(nextSlide, 3000));
const changeSlideImg = (e) => {
    let i = 0;
    for (i; i < n; i++) slides[i].classList.remove("active");
    e.currentTarget.classList.add("active");

    const activeSlide = document.querySelector(".slide.active");
    const slideBgImg = getComputedStyle(activeSlide).backgroundImage;

    container.style.backgroundImage = slideBgImg;
};

positionSlides();
nextSlide();
autoPlay();

btnPrev.addEventListener("click", prevSlide);
btnNext.addEventListener("click", nextSlide);
btns.forEach((btn) => {
    btn.addEventListener("mouseenter", () => clearInterval(setId));
    btn.addEventListener("mouseleave", () => {
        clearInterval(setId);
        autoPlay();
    });
});
// slides.forEach((slide) => {
// if (touchDevice()) {
//     slide.addEventListener("click", (e) => {
//         changeSlideImg(e);
//         clearInterval(setId);
//         autoPlay();
//     });
// } else {
//     slide.addEventListener("mouseenter", (e) => {
//         changeSlideImg(e);
//         clearInterval(setId);
//     });
//     slide.addEventListener("mouseleave", () => {
//         clearInterval(setId);
//         autoPlay();
//     });
// }
// );
window.addEventListener("resize", () => {
    clearInterval(setId);
    positionSlides();
    autoPlay();
});
