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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section class="site-section">
        <div class="header__banner-news w-full max-w-max one-time ">
            <img src="{{ asset('image/banner.webp') }}" alt="">
            <img src="{{ asset('image/banner.webp') }}" alt="">
        </div>
        <section class="site-nav bg-sky-500 shadow">
            <div
                class="nav__container max-w-screen-2xl mx-auto h-20 flex items-center justify-between px-4 md:px-6 md:text-sm md:text-center lg:px-8 lg:text-sm xl:px-12">
                <div class="nav__logo">
                    <img src="{{ asset('image/logo.png') }}" alt="Logo" class="h-12">
                </div>
                <div class="nav__search flex-grow mx-4 md:mx-6 lg:mx-8 xl:mx-10">
                    <div class="search__wrapper relative w-auto">
                        <input type="text"
                            class="search__input w-full p-2 md:p-3 lg:p-4 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
                            placeholder="Search...">
                        <div
                            class="search__icon absolute inset-y-0 left-0 pl-2 md:pl-3 lg:pl-4 flex items-center pointer-events-none">
                           
                        </div>
                    </div>
                </div>
                <div class="nav__menu hidden md:flex space-x-4 lg:space-x-6 text-gray-700">
                    <ul class="flex space-x-4 lg:space-x-6 text-white	">
                        <li class="menu__item menu__item--white flex items-center flex-col ">
                            <i class="fa-solid fa-layer-group text-xl" style="color: #ffffff;"></i>
                            <a href="#">Xây dựng cấu hình</a>
                        </li>
                        <li class="menu__item menu__item--white flex items-center flex-col ">
                            <i class="fa-solid fa-phone text-xl" style="color: #ffffff;"></i>
                            <a href="#">Khách hàng liên hệ</a>
                        </li>
                        <li class="menu__item menu__item--white flex items-center flex-col">
                            <i class="fa-solid fa-receipt text-xl" style="color: #ffffff;"></i>
                            <a href="#">Tin tức công nghệ</a>
                        </li>
                        <li class="menu__item menu__item--white flex items-center flex-col">
                            <i class="fa-solid fa-person-chalkboard text-xl " style="color: #ffffff;"></i>
                            <a href="#">Theo dõi đơn hàng</a>
                        </li>
                        <li class="menu__item menu__item--white flex items-center flex-col">
                            <i class="fa-solid fa-cart-shopping text-xl" style="color: #ffffff;"></i>
                            <a href="#">Giỏ hàng</a>
                        </li>
                        <li class="menu__item menu__item--white flex items-center flex-col">
                            <i class="fa-solid fa-user text-xl" style="color: #ffffff;"></i>
                            <a href="#">Tài khoản</a>
                        </li>
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
        </section>
        {{-- menu mobile --}}
        <section>
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
        {{-- menu --}}
        <section class="bg-sky-600" style="overflow-x: auto;white-space: nowrap;width: 100%;">
            <div class="nav__container max-w-screen-2xl h-14 mx-auto flex items-center justify-between px-16">
                <div class="nav__menu  md:flex space-x-6 text-gray-700 ">
                    <ul class="flex space-x-6 text-white">
                        <li class=" border-solid  divide-x w-60 h-10 rounded-md	 flex items-center justify-center bg-white text-black	">
                            <i class="fa-solid fa-bars mr-2" style="color: #000000;"></i>
                            <a href="" class="mr-2">DANH MỤC SẢN PHẨM</a>
                        </li>
                        <li class="hover:text-blue-500 flex items-center">
                            <i class="fa-solid fa-computer mr-2" style="color: #ffffff;"></i>
                            <a href="#"class="mr-2 ">PC GAMEMING</a>
                        </li>
                        <li class="hover:text-blue-500  flex items-center">
                            <i class="fa-brands fa-windows mr-2" style="color: #ffffff;"></i>
                            <a href="#"class="mr-2">PC VĂN PHÒNG</a>
                        </li>
                        <li class="hover:text-blue-500  flex items-center">
                            <i class="fa-solid fa-screwdriver-wrench  mr-2" style="color: #ffffff;"></i>
                            <a href="#"class="mr-2">LINH KIỆN PC</a>
                        </li>
                        <li class="hover:text-blue-500 flex items-center">
                            <i class="fa-solid fa-desktop  mr-2 " style="color: #ffffff;"></i>
                            <a href="#" class=" mr-2">MÀN HÌNH </a>
                        </li>
                        <li class="hover:text-blue-500 flex items-center">
                            <i class="fa-solid fa-laptop mr-2" style="color: #ffffff;"></i>
                            <a href="#" class="mr-2">LAPTOP</a>
                        </li>
                        <li class="hover:text-blue-500 flex items-center">
                            <i class="fa-solid fa-chalkboard  mr-2 " style="color: #ffffff;"></i>
                            <a href="#" class=" mr-2 ">THIẾT BỊ VĂN PHÒNG</a>
                        </li>
                        <li class="hover:text-blue-500 flex items-center">
                            <i class="fa-brands fa-uncharted mr-2 " style="color: #ffffff;"></i>
                            <a href="#" class="mr-2 ">PHÍM CHUỘT GHẾ GAMEMING</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>








        

<footer class="bg-white dark:bg-gray-900">
    <div class="mx-auto w-full max-w-screen-2xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
          <div class="mb-6 md:mb-0">
              <a href="" class="flex items-center">
              
                  <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Liên hệ</span>
              </a>
          </div>
          <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Chính sách</h2>
                  <ul class="text-gray-500 dark:text-gray-400 font-medium">
                      <li class="mb-4">
                          <a href="https://flowbite.com/" class="hover:underline">Hỗ Trợ</a>
                      </li>
                      <li>
                          <a href="https://tailwindcss.com/" class="hover:underline"></a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Hỗ Trợ</h2>
                  <ul class="text-gray-500 dark:text-gray-400 font-medium">
                      
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">newsletter</h2>
                  <ul class="text-gray-500 dark:text-gray-400 font-medium">
                      <li class="mb-4">
                          <a href="#" class="hover:underline">Privacy Policy</a>
                      </li>
                      <li>
                          <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
      <div class="sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/" class="hover:underline">Flowbite™</a>. All Rights Reserved.
          </span>
          <div class="flex mt-4 sm:justify-center sm:mt-0">
              <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                        <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                    </svg>
                  <span class="sr-only">Facebook page</span>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                        <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z"/>
                    </svg>
                  <span class="sr-only">Discord community</span>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                    <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd"/>
                </svg>
                  <span class="sr-only">Twitter page</span>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
                  </svg>
                  <span class="sr-only">GitHub account</span>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd"/>
                </svg>
                  <span class="sr-only">Dribbble account</span>
              </a>
          </div>
      </div>
    </div>
</footer>

</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"
    integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/slickside.js') }}"></script>
