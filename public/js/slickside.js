/******/ (() => {
    // webpackBootstrap
    /******/ "use strict";
    /******/ // The require scope
    /******/ var __webpack_require__ = {};
    /******/
    /************************************************************************/
    /******/ /* webpack/runtime/make namespace object */
    /******/ (() => {
        /******/ // define __esModule on exports
        /******/ __webpack_require__.r = (exports) => {
            /******/ if (typeof Symbol !== "undefined" && Symbol.toStringTag) {
                /******/ Object.defineProperty(exports, Symbol.toStringTag, {
                    value: "Module",
                });
                /******/
            }
            /******/ Object.defineProperty(exports, "__esModule", {
                value: true,
            });
            /******/
        };
        /******/
    })();
    /******/
    /************************************************************************/
    var __webpack_exports__ = {};
    /*!***********************************!*\
  !*** ./resources/js/slickside.js ***!
  \***********************************/
    __webpack_require__.r(__webpack_exports__);
    $(".one-time").slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 8000,
    });
    document.addEventListener("DOMContentLoaded", function () {
        var menuToggle = document.getElementById("menu-toggle");
        var mobileMenu = document.getElementById("mobile-menu");
        menuToggle.addEventListener("click", function () {
            mobileMenu.classList.toggle("hidden");
        });
    });
    $(document).ready(function () {
        $(".autoplay").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    });
    $(document).ready(function () {
        $(".autoplay-slider").slick({
            infinite: true,
            speed: 300,
            slidesToShow: 5,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 1280,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: true,
                    },
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    });
    $(document).ready(function () {
        $(".slider-for").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: ".slider-nav",
        });
        $(".slider-nav").slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: ".slider-for",
            dots: true,
            centerMode: true,
            focusOnSelect: true,
        });
    });
    $(document).ready(function () {
        $(".autoplay-sliderr").slick({
            // slidesToShow: 5,
            // slidesToScroll: 1,
            // autoplay: true,
            // autoplaySpeed: 2000,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 1280,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: true,
                    },
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    });
    $(document).ready(function () {
        $(".autoplay-sliderrsre").slick({
            // slidesToShow: 5,
            // slidesToScroll: 1,
            // autoplay: true,
            // autoplaySpeed: 2000,
            infinite: true,
            speed: 300,
            slidesToShow: 10,
            adaptiveHeight: true,
        });
    });
    $(document).ready(function () {
        $(".autoplay-evaluate").slick({
            // slidesToShow: 5,
            // slidesToScroll: 1,
            // autoplay: true,
            // autoplaySpeed: 2000,
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 1280,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: true,
                    },
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    });
    __webpack_require__.r(__webpack_exports__);
    $(".one-time").slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 8000,
    });
    document.addEventListener("DOMContentLoaded", function () {
        var menuToggle = document.getElementById("menu-toggle");
        var mobileMenu = document.getElementById("mobile-menu");
        menuToggle.addEventListener("click", function () {
            mobileMenu.classList.toggle("hidden");
        });
    });
    $(document).ready(function () {
        $(".autoplay").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    });
    $(document).ready(function () {
        $(".autoplay-slider").slick({
            infinite: true,
            speed: 300,
            slidesToShow: 5,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 1280,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: true,
                    },
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    });
    $(document).ready(function () {
        $(".slider-for").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: ".slider-nav",
        });
        $(".slider-nav").slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: ".slider-for",
            dots: true,
            centerMode: true,
            focusOnSelect: true,
        });
    });
    $(document).ready(function () {
        $(".autoplay-sliderr").slick({
            // slidesToShow: 5,
            // slidesToScroll: 1,
            // autoplay: true,
            // autoplaySpeed: 2000,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 1280,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: true,
                    },
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    });
    $(document).ready(function () {
        $(".autoplay-evaluate").slick({
            // slidesToShow: 5,
            // slidesToScroll: 1,
            // autoplay: true,
            // autoplaySpeed: 2000,
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 1280,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: true,
                    },
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    });
    __webpack_require__.r(__webpack_exports__);
    $(".one-time").slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 8000,
    });
    document.addEventListener("DOMContentLoaded", function () {
        var menuToggle = document.getElementById("menu-toggle");
        var mobileMenu = document.getElementById("mobile-menu");
        menuToggle.addEventListener("click", function () {
            mobileMenu.classList.toggle("hidden");
        });
    });
    $(document).ready(function () {
        $(".autoplay").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    });
    $(document).ready(function () {
        $(".autoplay-slider").slick({
            infinite: true,
            speed: 300,
            slidesToShow: 5,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 1280,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: true,
                    },
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    });
    $(document).ready(function () {
        $(".slider-for").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: ".slider-nav",
        });
        $(".slider-nav").slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: ".slider-for",
            dots: true,
            centerMode: true,
            focusOnSelect: true,
        });
    });
    $(document).ready(function () {
        $(".autoplay-sliderr").slick({
            // slidesToShow: 5,
            // slidesToScroll: 1,
            // autoplay: true,
            // autoplaySpeed: 2000,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 1280,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: true,
                    },
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    });
    $(document).ready(function () {
        $(".autoplay-sliderrsre").slick({
            // slidesToShow: 5,
            // slidesToScroll: 1,
            // autoplay: true,
            // autoplaySpeed: 2000,
            infinite: true,
            speed: 300,
            slidesToShow: 10,
            adaptiveHeight: true,
        });
    });
    $(document).ready(function () {
        $(".autoplay-evaluate").slick({
            // slidesToShow: 5,
            // slidesToScroll: 1,
            // autoplay: true,
            // autoplaySpeed: 2000,
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 1280,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: true,
                    },
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    });
    /******/
})();
