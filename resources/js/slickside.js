$('.one-time').slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  adaptiveHeight: true,
  autoplay: true, 
  autoplaySpeed: 8000
});
document.addEventListener('DOMContentLoaded', function() {
  var menuToggle = document.getElementById('menu-toggle');
  var mobileMenu = document.getElementById('mobile-menu');

  menuToggle.addEventListener('click', function() {
      mobileMenu.classList.toggle('hidden');
  });
});