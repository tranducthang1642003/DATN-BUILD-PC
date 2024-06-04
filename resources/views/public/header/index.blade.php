<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css"
        integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"
        integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <section class="site-section">
        <div class="header__banner-news w-full max-w-max one-time ">
            <img src="{{ asset('image/banner.webp') }}" alt="">
            <img src="{{ asset('image/banner.webp') }}" alt="">
        </div>
        <section class="site-nav bg-sky-500 shadow">
          <div class="nav__container max-w-screen-2xl mx-auto h-20 flex items-center justify-between px-16">
              <div class="nav__logo">
                  <img src="{{ asset('image/logo.png') }}" alt="Logo" class="h-12">
              </div>
              <div class="nav__search flex-grow mx-6">
                  <div class="search__wrapper relative w-auto">
                      <input type="text"
                          class="search__input w-full p-3 pl-10 pr-4 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
                          placeholder="Search...">
                      <div class="search__icon absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                          {{-- <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 2l2 2m4 0l2 2M8 8l2 2M8 2l2 2M2 8l2 2"></path>
                      </svg> --}}
                      </div>
                  </div>
              </div>
              <div class="nav__menu hidden md:flex space-x-6 text-gray-700">
                  <ul class="flex space-x-6">
                      <li class="menu__item menu__item--white"><a href="#">
                              <img src="{{ asset('image/pc.png') }}" alt="">Xây dựng cấu hình</a></li>
                      <li class="menu__item menu__item--white "><img src="{{ asset('image/pc.png') }}"
                              alt=""><a href="#">Khách hàng liên hệ</a></li>
                      <li class="menu__item menu__item--white"><img src="{{ asset('image/pc.png') }}"
                              alt=""><a href="#">Tin tức công nghệ</a></li>
                      <li class="menu__item menu__item--white"><img src="{{ asset('image/pc.png') }}"
                              alt=""><a href="#">Theo dõi đơn hàng</a></li>
                      <li class="menu__item menu__item--white"><img src="{{ asset('image/pc.png') }}"
                              alt=""><a href="#">Giỏ hàng</a></li>
                      <li class="menu__item menu__item--white"><img src="{{ asset('image/pc.png') }}"
                              alt=""><a href="#">Tài khoản</a></li>
                  </ul>
              </div>
              <div class="md:hidden">
                  <button id="menu-toggle" class="text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"></path>
                      </svg>
                  </button>
              </div>
          </div>
      </section
        <section class="bg-sky-600 ">
            <div class="nav__container max-w-screen-2xl h-14 mx-auto flex items-center justify-between px-16">
                <div class="nav__menu  md:flex space-x-6 text-gray-700">
                    <ul class="flex space-x-6">
                        <li class="hover:text-blue-500">DANH MỤC SẢN PHẨM</a></li>
                        <li class="hover:text-blue-500"><a href="#">PC</a></li>
                        <li class="hover:text-blue-500"><a href="#">PC Al</a></li>
                        <li class="hover:text-blue-500"><a href="#">LINH KIỆN PC</a></li>
                        <li class="hover:text-blue-500"><a href="#">MÀN HÌNH </a></li>
                        <li class="hover:text-blue-500"><a href="#">LAPTOP</a></li>
                        <li class="hover:text-blue-500"><a href="#">THIẾT BỊ VĂN PHÒNG</a></li>
                        <li class="hover:text-blue-500"><a href="#">PHÍM CHUỘT GHẾ GAMEMING</a></li>
                    </ul>
                </div>
            </div>
        </section>
    </section>
    <div id="mobile-menu" class="hidden md:hidden">
        <ul class="flex flex-col space-y-2 text-gray-700 px-6">
            <li class="hover:text-blue-500"><img src="" alt=""><a href="#">Xây dựng cấu
                    hình</a></li>
            <li class="hover:text-blue-500"><a href="#">Khách hàng liên hệ</a></li>
            <li class="hover:text-blue-500"><a href="#">Tin tức công nghệ</a></li>
            <li class="hover:text-blue-500"><a href="#">Theo dõi đơn hàng</a></li>
            <li class="hover:text-blue-500"><a href="#">Giỏ hàng</a></li>
            <li class="hover:text-blue-500"><a href="#">Tài khoản</a></li>
        </ul>
    </div>
    </section>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"
    integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/slickside.js') }}"></script>
