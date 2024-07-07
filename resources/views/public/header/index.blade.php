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
</head>

<body>

    <section class="site-section w-full">
        <div class="header__banner-news w-full max-w-max one-time">
            <img src="{{ asset('image/banner.webp') }}" alt="">
            <img src="{{ asset('image/banner.webp') }}" alt="">
        </div>
        <section class="site-nav bg-sky-500 shadow">
            <div class="nav__container  mx-auto h-20 flex items-center justify-between px-4 md:px-6 md:text-sm md:text-center lg:px-8 lg:text-sm xl:px-12">
                <div class="nav__logo">
                    <img src="{{ asset('image/logo.png') }}" alt="Logo" class="h-12">
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
                        {{-- <li class="menu__item menu__item--white flex items-center flex-col">
                            <i class="fa-solid fa-cart-shopping text-xl" style="color: #ffffff;"></i>
                            <a href="#">Giỏ hàng</a>
                            <span id="cart-count" class="text-white bg-red-500 rounded-full px-2">{{ $cartCount }}</span>
                        </li> --}}
                        <div class="relative">
                            <button class="menu__item menu__item--white flex items-center flex-col" onclick="toggleDropdown()">
                                <i class="fa-solid fa-user text-xl" style="color: #ffffff;"></i>
                                <a href="#">Tài khoản</a>
                            </button>
                            <ul id="dropdown" class="absolute hidden mt-2 bg-white border border-gray-300 rounded-md">
                                @if (!Auth::check())
                                <a href="{{route('login')}}">
                                    <li class="px-7 py-1 hover:bg-gray-100 text-black">Login</li>
                                </a>
                                <a href="{{route('register')}}">
                                    <li class="px-7 py-1 hover:bg-gray-100 text-black">Register</li>
                                </a>
                                @else

                                @if (Auth::check())
                                <a href="{{route('dashboard')}}">
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
                    <li class="hover:text-blue-500"><img src="" alt=""><a href="#">Xây dựng cấu hình</a></li>
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
            <div class="nav__container max-w-screen-2xl h-14 mx-auto flex items-center justify-between px-4 md:px-6 lg:px-8 xl:px-12" style="overflow-x: auto; white-space: nowrap;">
                <div class="nav__menu md:flex space-x-6 text-gray-700">
                    <ul class="flex space-x-6 text-white">
                        <li class="border-solid divide-x w-60 h-10 rounded-md flex items-center justify-center bg-white text-black">
                            <i class="fa-solid fa-bars mr-2" style="color: #000000;"></i>
                            <a href="" class="mr-2">DANH MỤC SẢN PHẨM</a>
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
                        <li class="hover:text-blue-500 flex items-center">
                            <i class="fa-brands fa-uncharted mr-2" style="color: #ffffff;"></i>
                            <a href="#" class="mr-2">PHÍM CHUỘT GHẾ GAMING</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/slickside.js') }}"></script>
</body>

</html>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    document.querySelectorAll('.add-to-cart-button').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            let productId = this.dataset.productId;
            let quantity = 1; // Hoặc lấy số lượng từ input nếu có

            fetch('/cart/add', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        quantity: quantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('cart-count').innerText = data.cartCount;
                        alert(data.success);
                    } else {
                        alert(data.error);
                    }
                })
                .catch(error => console.error('Error:', error));
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