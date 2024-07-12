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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Thêm Toastify -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</head>
<style>
    .slick-prev,
    .slick-next {
        display: none !important;
    }
</style>

<body>
    <div class="fixed inset-0 bg-white bg-opacity-75 flex items-center justify-center z-50" id="loading-screen">
        <div class="loader border-t-4 border-b-4 border-blue-500 rounded-full w-16 h-16 animate-spin"></div>
    </div>
    <section class="site-section w-full">
        <div class="header__banner-news w-full max-w-max one-time">
            <img src="{{ asset('image/banner.webp') }}" alt="">
            <img src="{{ asset('image/banner.webp') }}" alt="">
        </div>
        <section class="site-nav bg-sky-500 shadow">
            <div
                class="nav__container  mx-auto h-20 flex items-center justify-between px-4 md:px-6 md:text-sm md:text-center lg:px-8 lg:text-sm xl:px-12">
                <div class="nav__logo">
                    <img src="{{ asset('image/logo.png') }}" alt="Logo" class="h-12">
                </div>
                <div class="nav__search flex-grow mx-4 md:mx-6 lg:mx-8 xl:mx-10">
                    <div class="search__wrapper relative w-auto">
                        <input type="text"
                            class="search__input w-full p-2 md:p-3 lg:p-3 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
                            placeholder="Search...">
                        <div
                            class="search__icon absolute inset-y-0 left-0 pl-2 md:pl-3 lg:pl-4 flex items-center pointer-events-none">
                            <!-- Search icon can go here -->
                        </div>
                    </div>
                </div>
                <div class="nav__menu hidden md:flex space-x-4 lg:space-x-6 text-gray-700">
                    <ul class="flex space-x-4 lg:space-x-6 text-white">
                        <li class="menu__item menu__item--white flex items-center flex-col">
                            <i class="fa-solid fa-layer-group text-xl" style="color: #ffffff;"></i>
                            <a href="#">Xây dựng cấu hình</a>
                        </li>
                        <li class="menu__item menu__item--white flex items-center flex-col">
                            <i class="fa-solid fa-phone text-xl" style="color: #ffffff;"></i>
                            <a href="#">Khách hàng liên hệ</a>
                        </li>
                        <li class="menu__item menu__item--white flex items-center flex-col">
                            <i class="fa-solid fa-receipt text-xl" style="color: #ffffff;"></i>
                            <a href="#">Tin tức công nghệ</a>
                        </li>
                        <li class="menu__item menu__item--white flex items-center flex-col">
                            <i class="fa-solid fa-person-chalkboard text-xl" style="color: #ffffff;"></i>
                            <a href="#">Theo dõi đơn hàng</a>
                        </li>
                        <li class="menu__item menu__item--white flex items-center flex-col relative">
                            <i class="fa-solid fa-cart-shopping text-xl" style="color: #ffffff;"></i>
                            <a href="#" id="cart-dropdown-toggle">Giỏ hàng</a>
                            @php
                                $cartCount = session('cart_count', 0);
                            @endphp
                            @if ($cartCount > 0)
                                <span id="cart-count" class="text-white bg-red-500 rounded-full px-2">{{ $cartCount }}</span>
                            @endif
                            <div id="cart-dropdown" class="absolute bg-white border border-gray-200 shadow-md rounded p-2 mt-2 w-64 hidden overflow-auto max-h-64">
                                <!-- Sản phẩm trong giỏ hàng sẽ được chèn vào đây bởi JavaScript -->
                                <ul id="cart-items-list"></ul>
                                <div class="mt-2">
                                    <a href="{{ route('cart') }}" class="bg-blue-500 text-white rounded px-4 py-2 block text-center">Xem giỏ hàng</a>
                                </div>
                            </div>
                        </li>
                        
                        <style>


                            #cart-dropdown {
                                display: none;
                            }

                            /* Show the dropdown when hovering over the cart icon or link */
                            .menu__item:hover #cart-dropdown {
                                display: block;
                            }

                            /* Basic styling for demonstration */
                            body {
                                font-family: Arial, sans-serif;
                            }

                            .menu__item {
                                position: relative;
                                margin: 20px;
                            }

                            #cart-icon {
                                font-size: 24px;
                                cursor: pointer;
                            }

                            #cart-dropdown {
                                z-index: 1000;
                                background-color: #fff;
                                border: 1px solid #ddd;
                                padding: 10px;
                                border-radius: 5px;
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                max-height: 200px;
                                overflow-y: auto;
                                width: 300px;
                            }

                            #cart-count {
                                background-color: red;
                                color: white;
                                border-radius: 50%;
                                padding: 5px 10px;
                                font-size: 14px;
                                position: absolute;
                                top: -10px;
                                right: -10px;
                            }

                            #cart-items-list {
                                list-style-type: none;
                                padding: 0;
                                margin: 0;
                            }

                            #cart-items-list li {
                                margin-bottom: 10px;
                            }

                            #cart-items-list li:last-child {
                                margin-bottom: 0;
                            }

                            a {
                                text-decoration: none;
                                color: #000;
                            }

                            a:hover {
                                text-decoration: underline;
                            }
                        </style>

                        <div class="relative">
                            <button class="menu__item menu__item--white flex items-center flex-col"
                                onclick="toggleDropdown()">
                                <i class="fa-solid fa-user text-xl" style="color: #ffffff;"></i>
                                <a href="#">Tài khoản</a>
                            </button>
                            <ul id="dropdown" class="absolute hidden mt-2 bg-white border border-gray-300 rounded-md">
                                @if (!Auth::check())
                                    <a href="{{ route('login') }}">
                                        <li class="px-7 py-1 hover:bg-gray-100 text-black">Login</li>
                                    </a>
                                    <a href="{{ route('register') }}">
                                        <li class="px-7 py-1 hover:bg-gray-100 text-black">Register</li>
                                    </a>
                                @else
                                    @if (Auth::check())
                                        <a href="{{ route('dashboard') }}">
                                            <li class="px-7 py-1 hover:bg-gray-100 text-black">Tài khoản</li>
                                        </a>
                                    @endif
                                    <li class="px-7 py-1 hover:bg-gray-100 text-black">
                                        <form method="POST" action="/logout">
                                            @csrf
                                            <button type="submit" class="logout-btn">Logout</button>
                                        </form>
                                    </li>
                                @endif
                            </ul>
                        </div>

                        <script>
                            function toggleDropdown() {
                                const dropdown = document.getElementById('dropdown');
                                dropdown.classList.toggle('hidden');
                            }
                        </script>

                    </ul>
                </div>
                <div class="md:hidden">
                    <button id="menu-toggle"
                        class="text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </section>
        {{-- Mobile menu --}}
        <section>
            <div id="mobile-menu" class="hidden md:hidden">
                <ul class="flex flex-col space-y-2 text-gray-700 px-6">
                    <li class="hover:text-blue-500"><img src="" alt=""><a href="#">Xây dựng
                            cấu hình</a></li>
                    <li class="hover:text-blue-500"><a href="#">Khách hàng liên hệ</a></li>
                    <li class="hover:text-blue-500"><a href="#">Tin tức công nghệ</a></li>
                    <li class="hover:text-blue-500"><a href="#">Theo dõi đơn hàng</a></li>
                    <li class="hover:text-blue-500"><a href="#">Giỏ hàng</a></li>
                    <li class="hover:text-blue-500"><a href="#">Tài khoản</a></li>
                </ul>
            </div>
        </section>


        {{-- Desktop menu --}}
        <section class="bg-sky-600">
            <div
                class="nav__container max-w-screen-2xl h-14 mx-auto flex items-center justify-between px-4 md:px-6 lg:px-8 xl:px-12">
                <div class="nav__menu md:flex space-x-6 text-gray-700">
                    <ul class="flex space-x-6 text-white">
                        <li
                            class="relative border-solid divide-x w-60 h-10 rounded-md flex items-center justify-center bg-white text-black hover:bg-gray-100 cursor-pointer">
                            <i class="fa-solid fa-bars mr-2" style="color: #000000;"></i>
                            <a href="#" class="mr-2">DANH MỤC SẢN PHẨM</a>
                            <!-- Dropdown Menu -->
                            <ul id="dropdownMenu"
                                class="absolute left-0 top-full mt-2 hidden w-60 bg-white rounded-md shadow-md">
                                <li class="p-2 hover:bg-gray-100"><a href="#">Sản phẩm 1</a></li>
                                <li class="p-2 hover:bg-gray-100"><a href="#">Sản phẩm 2</a></li>
                                <li class="p-2 hover:bg-gray-100"><a href="#">Sản phẩm 3</a></li>
                            </ul>
                        </li>
                        <li class="hover:text-blue-500 flex items-center">
                            <i class="fa-solid fa-computer mr-2" style="color: #ffffff;"></i>
                            <a href="#" class="mr-2">PC GAMING</a>
                        </li>
                        <li class="hover:text-blue-500 flex items-center">
                            <i class="fa-brands fa-windows mr-2" style="color: #ffffff;"></i>
                            <a href="#" class="mr-2">PC VĂN PHÒNG</a>
                        </li>
                        <li class="hover:text-blue-500 flex items-center">
                            <i class="fa-solid fa-screwdriver-wrench mr-2" style="color: #ffffff;"></i>
                            <a href="#" class="mr-2">LINH KIỆN PC</a>
                        </li>
                        <li class="hover:text-blue-500 flex items-center">
                            <i class="fa-solid fa-desktop mr-2" style="color: #ffffff;"></i>
                            <a href="#" class="mr-2">MÀN HÌNH</a>
                        </li>
                        <li class="hover:text-blue-500 flex items-center">
                            <i class="fa-solid fa-laptop mr-2" style="color: #ffffff;"></i>
                            <a href="#" class="mr-2">LAPTOP</a>
                        </li>
                        <li class="hover:text-blue-500 flex items-center">
                            <i class="fa-solid fa-chalkboard mr-2" style="color: #ffffff;"></i>
                            <a href="#" class="mr-2">THIẾT BỊ VĂN PHÒNG</a>
                        </li>
                        <li class="hover:text-blue-500 flex items-center ">
                            <i class="fa-brands fa-uncharted mr-2" style="color: #ffffff;"></i>
                            <a href="#" class="mr-2">PHÍM CHUỘT GHẾ GAMING</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
</body>

</html>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"
    integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/slickside.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            var loadingScreen = document.getElementById('loading-screen');
            loadingScreen.style.display = 'none';
        }, 1000); // 5000 milliseconds = 5 seconds
    });
</script>

<script>
    $(document).ready(function() {
        $('#cart-dropdown-toggle').hover(function() {
            // Gửi yêu cầu AJAX để lấy danh sách sản phẩm trong giỏ hàng
            $.ajax({
                url: '{{ route('cart.getCartItems') }}',
                method: 'GET',
                success: function(response) {
                    if (response.success) {
                        var cartItemsList = $('#cart-items-list');
                        cartItemsList.empty(); // Xóa sạch danh sách cũ

                        response.cartItems.forEach(function(item) {
                            cartItemsList.append(
                                '<li class="flex items-center mb-2">' +
                                '<img src="' + item.primary_image_path +
                                '" alt="' + item.product_name +
                                '" class="w-12 h-12 mr-2 " >' +
                                '<div>' +
                                '<p  style="color: #000000	;">' + item
                                .product_name + '</p>' +
                                '<p style="color: #000000	;">' + item.quantity +
                                ' x ' + item.price +
                                '</p>' +
                                '</div>' +
                                '</li>'
                            );
                        });
                    } else {
                        alert('Không thể tải danh sách sản phẩm trong giỏ hàng.');
                    }
                },
                error: function(xhr, status, error) {
                    alert('Yêu cầu AJAX thất bại: ' + error);
                }
            });
        });
    });
</script>
<script>
    // Lấy phần tử danh mục sản phẩm và dropdown menu
    const menuItem = document.querySelector('.border-solid');
    const dropdownMenu = document.getElementById('dropdownMenu');

    // Thêm sự kiện khi di chuột vào và ra
    menuItem.addEventListener('mouseenter', function() {
        dropdownMenu.classList.remove('hidden');
    });

    menuItem.addEventListener('mouseleave', function() {
        dropdownMenu.classList.add('hidden');
    });
</script>
