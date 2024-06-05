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
        slidesToShow: 5,
        slidesToScroll: 1,
        // autoplay: true,
        autoplaySpeed: 2000,
    });
});
