$(document).ready(function () {
    //FOOTER CLICK
    $('#about-us-btn').click(function (e) {
        e.preventDefault();
        $('#about-us').slideToggle();
    });
    $('#read-news-btn').click(function (e) {
        e.preventDefault();
        $('#read-news').slideToggle();
    });
    $('#contacts-btn').click(function (e) {
        e.preventDefault();
        $('#contacts>li').slideToggle();
    });
});


function showBurgerContent() {
    $('.burger-content').toggleClass('active');
    $('.body').toggleClass('active');
}


$('.slider').slick({
    infinite: true,
    dots: true,
    arrows: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: '.to__left',
    nextArrow: '.to__right'
});

// var slider = $('.slider');

// $('.to__left .slick-prev').on('click', function() {
//   $(slider).slick('slickPrev');
// });
// $('.to__right .slick-next').on('click', function() {
//   $(slider).slick('slickNext');
// });



// СОЦ. СЕТИ
var quadrantItems = document.querySelectorAll('.quadrant__item');
var svgs = document.querySelectorAll('svg');
var cube = document.querySelector('.cube');
var closeButton = document.querySelector('.quadrant__item__content--close');
var isInside = false;

var tl = new TimelineLite({ paused: true });
tl.timeScale(1.6);

tl.to('.cube', 0.4, { rotation: 45, width: '120px', height: '120px', ease: Expo.easeOut }, 'first');
tl.to('.plus .plus-vertical', 0.3, { height: '0', backgroundColor: '#f45c41', ease: Power1.easeIn }, 'first');
tl.to('.plus .plus-horizontal', 0.3, { width: '0', backgroundColor: '#f45c41', ease: Power1.easeIn }, 'first');
tl.to('.cube', 0, { backgroundColor: 'transparent' });
tl.to(quadrantItems[0], 0.15, { x: -5, y: -5 }, 'seperate');
tl.to('.arrow-up', 0.2, { opacity: 1, y: 0 }, 'seperate+=0.2');
tl.to(quadrantItems[1], 0.15, { x: 5, y: -5 }, 'seperate');
tl.to('.arrow-right', 0.2, { opacity: 1, x: 0 }, 'seperate+=0.2');
tl.to(quadrantItems[3], 0.15, { x: 5, y: 5 }, 'seperate');
tl.to('.arrow-down', 0.2, { opacity: 1, y: 0 }, 'seperate+=0.2');
tl.to(quadrantItems[2], 0.15, { x: -5, y: 5 }, 'seperate');
tl.to('.arrow-left', 0.2, { opacity: 1, x: 0 }, 'seperate+=0.2');

cube.addEventListener('mouseenter', playTimeline);
cube.addEventListener('mouseleave', reverseTimeline);

function playTimeline(e) {
    e.stopPropagation();
    tl.play();
}

function reverseTimeline(e) {
    e.stopPropagation();
    tl.timeScale(1.8);
    tl.reverse();
}

$('.quadrant__item').click(function (e) {
    e.preventDefault();
    window.location.href = "https://inordic.ru/";
});


//SCROLLS
$('#contacts').click(function (e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: '2100px'
    }, 1000)
});
$('#about-company').click(function (e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: '2100px'
    }, 1000)
});
$('#news').click(function (e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: '1130px'
    }, 1000)
});
$('#main').click(function () {
    location.reload();
});

$('#up').click(function () {
    $('html, body').animate({
        scrollTop: 0
    }, 1000)
});

$(window).scroll(function (event) {
    var top = $(window).scrollTop();
    if (top >= 100) {
        $('.up-button').show();
        $('.social-button').show();
    } else {
        $('.up-button').hide();
        $('.social-button').hide();
    }
});


