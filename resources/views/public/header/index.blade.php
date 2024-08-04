<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Thêm Toastify -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<style>
    .slick-prev,
    .slick-next {
        display: none !important;
    }

    .navbar-menu .list-menu a:hover {
        background-color: rgb(14 165 233);
    }
</style>

<body>
    <div class="fixed inset-0 bg-white bg-opacity-75 flex items-center justify-center z-50" id="loading-screen">
        <div class="loader border-t-4 border-b-4 border-blue-500 rounded-full w-16 h-16 animate-spin"></div>
    </div>
    <section class="site-section w-full">
        <div class="header__banner-news w-full max-w-max one-time">



            @if($banners_top_header->isNotEmpty())
            @foreach($banners_top_header as $banner)
            <img src="{{ asset($banner->images_url)}}" alt="{{ $banner->alt_text }}">
            @endforeach
            @endif

        </div>

        <section class="site-nav bg-sky-500 shadow">
            <div class="nav__container  mx-auto h-20 flex items-center justify-between px-4 md:px-6 md:text-sm md:text-center lg:px-8 lg:text-sm xl:px-12">
                <div class="nav__logo " style="width:8%">
                    @if($logos->isNotEmpty())
                    @foreach($logos as $logo)
                    <p>{{ $logo->url }}</p>
                    <img src="{{ asset($logo->images_url) }}" alt="{{ $logo->alt_text }}">
                    @endforeach
                    @else
                    <p>No logos available.</p>
                    @endif
                </div>

                <div class="nav__search flex-grow mx-4 md:mx-6 lg:mx-8 xl:mx-10">
                    <form action="{{ route('product.search') }}" method="GET">
                        <div class="search__wrapper relative w-auto">
                            <input type="text" name="query" id="searchInput" class="search__input w-full p-2 md:p-3 lg:p-3 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300" placeholder="Search...">
                            <button type="submit" class="absolute inset-y-0 right-0 mr-3 hover:text-blue-600"><i class="fa-solid fa-magnifying-glass fa-lg"></i></button>
                        </div>
                    </form>
                    <ul id="suggestions" class="absolute z-50 bg-white mt-2 rounded-xl shadow-lg list-none p-0 m-0">

                    </ul>
                </div>



                <div class="nav__menu hidden md:flex space-x-4 lg:space-x-6 text-gray-700">
                    <ul class="flex space-x-4 lg:space-x-6 text-white items-center text-xs font-bold">
                        <li class="menu__item menu__item--white flex items-center flex-col">
                            <i class="fa-solid fa-layer-group text-xl icon"></i>
                            <a href="{{ route('buildpc') }}" class="mt-1 link">Xây dựng cấu hình</a>
                        </li>
                        <li class="menu__item menu__item--white flex items-center flex-col">
                            <i class="fa-solid fa-phone text-xl icon" style="color: #ffffff;"></i>
                            <a href="{{ route('contact.index') }}" class="mt-1 link">Khách hàng liên hệ</a>
                        </li>
                        <li class="menu__item menu__item--white flex items-center flex-col">
                            <i class="fa-solid fa-receipt text-xl icon" style="color: #ffffff;"></i>
                            <a href="{{ route('blog.index') }}" class="mt-1 link">Tin tức công nghệ</a>
                        </li>
                        <li class="menu__item menu__item--white flex items-center flex-col">
                            <i class="fa-solid fa-person-chalkboard text-xl icon" style="color: #ffffff;"></i>
                            <a href="{{ route('orders.lookup.form') }}" class="mt-1 link">Theo dõi đơn hàng</a>
                        </li>
                        <li class="menu__item menu__item--white flex items-center flex-col relative">
                            <i class="fa-solid fa-cart-shopping text-xl icon" style="color: #ffffff;"></i>
                            <a href="{{ route('cart') }}" id="cart-dropdown-toggle" class="mt-1 link">Giỏ hàng</a>
                            @php
                            $cartCount = session('cart_count', 0);
                            @endphp
                            <span id="cart-count" class="text-white bg-red-500 rounded-full px-2 icon" style="display: {{ $cartCount > 0 ? 'inline-block' : 'none' }}">{{ $cartCount }}</span>
                            <a href="{{ route('cart') }}">
                                <div id="cart-dropdown" class="absolute bg-white border border-gray-200 shadow-md rounded p-2 mt-2 w-64 hidden overflow-auto max-h-64">
                                </div>
                            </a>
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

                            .nav__menu .menu__item a {
                                text-decoration: none;
                                color: #fff;
                            }

                            .nav__menu .menu__item .icon {
                                transition: transform 0.3s ease-in-out, color 0.3s ease-in-out;
                            }

                            .nav__menu .menu__item:hover .icon {
                                transform: translateY(-4px) scale(1.1);
                            }
                        </style>
                        <div class="relative">
                            <button class="menu__item menu__item--white flex items-center flex-col" onclick="toggleDropdown()">
                                <i class="fa-solid fa-user text-xl icon" style="color: #ffffff;"></i>
                                @if(Auth::check())
                                @php
                                $email = Auth::user()->email;
                                $username = substr($email, 0, strpos($email, '@'));
                                @endphp
                                <span class="mt-2 link"><i class="fa-solid fa-hand-wave"></i> Chào, {{ $username }}</span>
                                @else
                                <a href="{{ route('login') }}" class="link">Tài khoản</a>
                                @endif
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
                                <a href="{{ route('dashboard') }}">
                                    <li class="px-7 py-1 hover:bg-gray-100 text-black" class="mt-2">Tài khoản</li>
                                </a>
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
                                var dropdown = document.getElementById('dropdown');
                                dropdown.classList.toggle('hidden');
                            }
                        </script>


                        <script>
                            function toggleDropdown() {
                                var dropdown = document.getElementById('dropdown');
                                dropdown.classList.toggle('hidden');
                            }
                        </script>


                    </ul>
                </div>



                <div class="md:hidden">
                    <button id="menu-toggle" class="text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
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
            <div class="nav__container max-w-screen-2xl h-14 mx-auto flex items-center justify-between px-4 md:px-6 lg:px-8 xl:px-12">
                <div class="nav__menu md:flex space-x-6 text-gray-700">
                    <ul class="flex space-x-6 text-white items-center	">
                    <li class="relative border-solid divide-x w-60 h-10 rounded-md flex items-center justify-center bg-white text-black cursor-pointer" style="z-index: 100;" onclick="toggleDropdown()">
    <i class="fa-solid fa-bars mr-2" style="color: #000000;"></i>
    <a href="#" onclick="toggleDropdown()" class="mr-2">DANH MỤC SẢN PHẨM</a>
                   
    <!-- Dropdown Menu -->

<ul id="dropdownMenu" class="absolute left-0 top-full mt-2 w-full bg-white rounded-md shadow-md z-10  grid-cols-1 gap-2 p-2 hidden group-hover:block">
    @foreach ($featuredCategories as $category)
        <li class="relative">
            <a href="{{ route('category.show', $category->slug) }}" class="flex items-center justify-between hover:bg-gray-100 rounded-md px-3 py-2">
                <div class="flex items-center space-x-2">
                    <img src="{{ $category->image }}" alt="{{ $category->category_name }}" class="w-10 h-10 object-cover rounded-full">
                    <span class="truncate">{{ $category->category_name }}</span>
                </div>
            </a>
        </li>
    @endforeach 
</ul>
</li>
                    <li class="flex items-center">
                        <ul class="navbar-menu flex">
                            @foreach ($menuItems as $menuItem)
                            <li class="list-menu mr-8 text-lg font-bold items-center">
                                <a href="{{ $menuItem->url }}" class="flex uppercase text-base font-normal link p-3">
                                    <img src="{{ asset($menuItem->image) }}" alt="" class="w-5 h-5 mr-2 icon" style="filter: invert(1);">
                                    <span>{{ $menuItem->name }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    </ul>
                </div>
            </div>
        </section>
</body>

</html>










<script src="{{ asset('js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                url: '{{ route("cart.getCartItems") }}',
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
                                '" class="w-12 h-12 mr-2">' +
                                '<div>' +
                                '<p style="color: #000000;">' + item
                                .product_name + '</p>' +
                                '<p style="color: #000000;">' + item.quantity +
                                ' x ' + item.price + '</p>' +
                                '</div>' +
                                '</li>'
                            );
                        });
                    } else {
                        alert('Không thể tải danh sách sản phẩm trong giỏ hàng.');
                    }
                },

            });
        });
    });
    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            var query = $(this).val().trim();
            if (query.length === 0) {
                $('#suggestions').empty().hide();
                return;
            }
            $.ajax({
                url: '{{ route("search.suggestions") }}',
                type: 'GET',
                data: {
                    query: query
                },
                success: function(response) {
                    var suggestionsList = $('#suggestions');
                    suggestionsList.empty();
                    if (response.length > 0) {
                        $.each(response, function(index, product) {
                            var imageUrl = product.primary_image_path ? product.primary_image_path : 'default-image.jpg';

                            var suggestionItem = '<li class="flex items-center p-2 cursor-pointer suggestion-item" data-product-slug="' + product.slug + '">' +
                                '<img src="' + imageUrl + '" class="w-12 h-12 rounded-full mr-3" alt="Product Image">' +
                                '<span class="text-sm hover:text-blue-500">' + product.product_name + '</span>' +
                                '</li>';

                            suggestionsList.append(suggestionItem);
                        });

                        suggestionsList.show();
                    } else {
                        suggestionsList.empty().hide();
                    }
                },
                error: function(error) {
                    console.error('Error fetching suggestions:', error);
                }
            });
        });
        $(document).on('click', '.suggestion-item', function() {
            var productId = $(this).data('product-slug');

            if (productId) {
                window.location.href = '/product/' + productId;
            } else {
                console.error('Missing product ID for suggestion:', $(this).text());
            }

            $('#suggestions').empty().hide();
        });
    });
</script>
<script>
    function toggleDropdown() {
        var dropdownMenu = document.getElementById('dropdownMenu');
        dropdownMenu.classList.toggle('hidden'); // Toggle 'hidden' class
    }
</script>