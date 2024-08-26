<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <!-- Check if logos are available and set the favicon -->
    @if($logos->isNotEmpty())
        @foreach($logos as $logo)
            <link rel="icon" href="{{ asset($logo->images_url) }}" type="image/png">
            @break
        @endforeach
    @else
        <link rel="icon" href="{{ asset('path/to/default-favicon.png') }}" type="image/png">
    @endif

    <!-- Rest of your head content -->
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            <div class="nav__container mx-auto h-20 flex items-center justify-between px-4 md:px-6 md:text-sm md:text-center lg:px-8 lg:text-sm xl:px-12">
                <div class="nav__logo w-24 mx-auto md:w-36" style="padding: 25px;">
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
                            <input type="text" name="query" id="searchInput"
                                class="search__input w-full p-2 md:p-3 lg:p-3 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
                                placeholder="Search...">
                            <button type="submit" class="absolute inset-y-0 right-0 mr-3 hover:text-blue-600"><i
                                    class="fa-solid fa-magnifying-glass fa-lg"></i></button>
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
                            <i id="cart-icon" class="fa-solid fa-cart-shopping text-xl icon"
                                style="color: #ffffff;"></i>
                            <a href="{{ route('cart') }}" id="cart-dropdown-toggle" class="mt-1 link">Giỏ hàng</a>
                            @php
                                $cartCount = session('cart_count', 0);
                            @endphp
                            <span id="cart-count" class="text-white bg-red-500 rounded-full px-2 icon"
                                style="display: {{ $cartCount > 0 ? 'inline-block' : 'none' }}">{{ $cartCount }}</span>
                            <div id="cart-dropdown"
                                class="absolute bg-white border border-gray-200 shadow-md rounded p-2 mt-2 w-64 hidden overflow-auto max-h-64">
                            </div>
                        </li>


                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                const cartIcon = document.getElementById('cart-icon');
                                const cartCountElement = document.getElementById('cart-count');

                                function updateCartCount(count) {
                                    cartCountElement.textContent = count;
                                    cartCountElement.style.display = count > 0 ? 'inline-block' : 'none';
                                }

                                // Example of updating cart count, you need to replace this with actual logic
                                function fetchCartCount() {
                                    // Fetch the cart count from your server (this is a placeholder example)
                                    fetch('/cart/count') // Make sure this route returns the cart count
                                        .then(response => response.json())
                                        .then(data => {
                                            updateCartCount(data.count);
                                        });
                                }

                                // Call fetchCartCount to initially set the cart count
                                fetchCartCount();

                                // Optionally, you can use WebSocket or another method to listen for cart updates
                            });

                        </script>

<div class="dropdown-container relative">
    <button class="dropdown-button flex items-center flex-col" onclick="toggleDropdown()">
        <i class="fa-solid fa-user text-xl icon" style="color: #ffffff;"></i>
        @if(Auth::check())
            @php
                $email = Auth::user()->email;
                $username = substr($email, 0, strpos($email, '@'));
            @endphp
            <span class="user-greeting mt-2"><i class="fa-solid fa-hand-wave"></i> Chào, {{ $username }}</span>
        @else
            <a href="{{ route('login') }}" class="login-link">Tài khoản</a>
        @endif
    </button>
    <ul id="user-dropdown-menu-1" class="dropdown-menu-1 mt-2">
        @if (!Auth::check())
            <li class="menu-option">
                <a href="{{ route('login') }}">Login</a>
            </li>
            <li class="menu-option">
                <a href="{{ route('register') }}">Register</a>
            </li>
        @else
            <li class="menu-option">
                <a href="{{ route('dashboard') }}">Tài khoản</a>
            </li>
            <li class="menu-option">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="logout-button">Logout</button>
                </form>
            </li>
        @endif
    </ul>
</div>

<style>
    .menu-option{
        display: flex;
    align-items: center;
    justify-content: center;
    width: 140px;
    font-size: 17px;
}
    
    .relative {
        position: relative;
    }

    .dropdown-menu-1 {
        visibility: hidden;
        opacity: 0;
        position: absolute;
        top: 100%;
        left: 0;
        width: max-content;
        background-color: #ffffff;
        transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
        transform: translateY(10px);
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        padding: 1rem;
        z-index: 50;
        width: 180px;
       color: #000;
       border-radius:15px;
    }

    .dropdown-container:hover .dropdown-menu-1,
    .dropdown-menu-1:hover {
        visibility: visible;
        opacity: 1;
        transform: translateY(0);
    }

    .menu-option a:hover {
        background-color: #f3f4f6;
    }
</style>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('user-dropdown-menu-1');
        const isHidden = window.getComputedStyle(dropdown).visibility === 'hidden';
        dropdown.style.visibility = isHidden ? 'visible' : 'hidden';
        dropdown.style.opacity = isHidden ? '1' : '0';
        dropdown.style.transform = isHidden ? 'translateY(0)' : 'translateY(10px)';
    }
</script>





                <div class="md:hidden">
                    <button id="menu-toggle" class="text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </section>
            <!-- Mobile menu -->
            <section id="mobile-menu" class="hidden fixed inset-y-0 left-0 w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out z-50">
                <div class="md:hidden p-4 border-b">
                </div>
                <div class="p-4 border-b">
                <ul class="navbar-menu">
                                    @foreach ($menuItems as $menuItem)
                                        <li class="list-menu text-lg font-bold items-center">
                                            <a href="{{ $menuItem->url }}"
                                                class="flex text-base font-normal link p-3">
                                                <img src="{{ asset($menuItem->image) }}" alt="" class="w-5 h-5 mr-2 icon"
                                                    style="filter: invert(0);">
                                                <span>{{ $menuItem->name }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                </div>
                <ul class="flex flex-col space-y-2 text-gray-700 my-3">
                    <li class="hover:text-blue-500 p-4 border-b font-bold uppercase"><a href="{{ route('orders.lookup.form') }}">Theo dõi đơn hàng</a>
                    </li>
                    <li class="hover:text-blue-500 p-4 border-b font-bold uppercase"><a href="{{ route('cart') }}">Giỏ hàng</a></li>
                    <li class="hover:text-blue-500 p-4 font-bold uppercase">
                        @if(Auth::check())
                            <a href="{{ route('dashboard') }}">Tài khoản</a>
                        @else
                            <a href="{{ route('login') }}">Tài khoản</a>
                        @endif
                    </li>
                </ul>
            </section>
            {{-- Desktop menu --}}

            <section class="bg-sky-600">
    <div class="nav__container md:flex max-w-screen-2xl h-14 mx-auto flex items-center justify-between px-4 md:px-6 lg:px-8 xl:px-12">
        <div class="nav__menu space-x-6 text-gray-700">
            <ul class="flex space-x-6 text-white items-center">
                <li id="dropdown-toggle"
                    class="relative border-solid divide-x w-60 h-10 rounded-md flex items-center justify-center bg-white text-black cursor-pointer">
                    <i class="fa-solid fa-bars mr-2" style="color: #000000;"></i>
                    <a href="#" class="mr-2">DANH MỤC SẢN PHẨM</a>

                    <!-- Dropdown Menu -->
                    <ul id="dropdown-menu" class="dropdown-menu">
                        @foreach ($featuredCategories as $category)
                            <li class="category-item">
                                <a href="{{ route('category.show', $category->slug) }}"
                                    class="flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <img src="{{ $category->image }}" alt="{{ $category->category_name }}"
                                            class="w-10 h-10 object-cover rounded-full">
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
                                <a href="{{ $menuItem->url }}"
                                    class="flex uppercase text-base font-normal link p-3">
                                    <img src="{{ asset($menuItem->image) }}" alt="" class="w-5 h-5 mr-2 icon"
                                        style="filter: invert(1);">
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

<style>
.relative {
    position: relative;
}

.dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    width: max-content;
    height: 60vh;
    background-color: #ffffff;
    overflow-y: auto;
    opacity: 0;
    transition: opacity 0.3s ease, transform 0.3s ease;
    transform: translateY(10px);
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    padding: 1rem;
    z-index: 50;
}

.category-item {
    list-style: none;
}

.category-item a {
    text-decoration: none;
    color: inherit;
    display: block;
    padding: 0.5rem;
    border-radius: 0.375rem;
    transition: background-color 0.3s ease;
}

.category-item a:hover {
    background-color: #f3f4f6;
}



</style>

<script>
    document.getElementById('dropdown-toggle').addEventListener('click', function() {
        const dropdownMenu = document.getElementById('dropdown-menu');
        if (dropdownMenu.style.display === 'grid') {
            dropdownMenu.style.opacity = '0';
            dropdownMenu.style.transform = 'translateY(10px)';
            setTimeout(() => {
                dropdownMenu.style.display = 'none';
            }, 300); // Match this duration with the transition time
        } else {
            dropdownMenu.style.display = 'grid';
            setTimeout(() => {
                dropdownMenu.style.opacity = '1';
                dropdownMenu.style.transform = 'translateY(0)';
            }, 0); // Ensure it starts the transition immediately
        }
    });
</script>


        </style>
</body>

</html>










<script src="{{ asset('js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"
    integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/slickside.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(function () {
            var loadingScreen = document.getElementById('loading-screen');
            loadingScreen.style.display = 'none';
        }, 1000); // 5000 milliseconds = 5 seconds
    });
</script>

<script>
    $(document).ready(function () {
        $('#cart-dropdown-toggle').hover(function () {
            // Gửi yêu cầu AJAX để lấy danh sách sản phẩm trong giỏ hàng
            $.ajax({
                url: '{{ route("cart.getCartItems") }}',
                method: 'GET',
                success: function (response) {
                    if (response.success) {
                        var cartItemsList = $('#cart-items-list');
                        cartItemsList.empty(); // Xóa sạch danh sách cũ
                        response.cartItems.forEach(function (item) {
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
    $(document).ready(function () {
        $('#searchInput').on('input', function () {
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
                success: function (response) {
                    var suggestionsList = $('#suggestions');
                    suggestionsList.empty();
                    if (response.length > 0) {
                        $.each(response, function (index, product) {
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
                error: function (error) {
                    console.error('Error fetching suggestions:', error);
                }
            });
        });
        $(document).on('click', '.suggestion-item', function () {
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