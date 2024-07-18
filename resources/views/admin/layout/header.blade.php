<!DOCTYPE html>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link href="https://unpkg.com/@mui/material@5.9.2/dist/material-ui.min.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
</head>

<body class="bg-slate-300">
    <div x-data="{ sidebarOpen: true }" class="flex text-sm-xs">
        <div :class="sidebarOpen ? 'block transform transition-all duration-300 translate-x-0' : 'hidden transform transition-all duration-300 -translate-x-full'" class=" p-4 drop-shadow-xl bg-slate-800 min-w-64 top-0 left-0 z-50 min-h-screen">

            <div class="flex items-center justify-center mb-12 mt-2">
                <a href="{{ route('home') }}"><img src="{{ asset('image/logo.svg') }}" width="100" alt=""></a>
            </div>
            <div class="">
                <div class="">
                    <a class="w-full" href="{{ route('admin') }}">
                        <button id="dashboard" class="button_sidebar dashboard_active">
                            <p><ion-icon class="icon_sidebar" name="logo-microsoft"></ion-icon>Dashboard</p>
                        </button>
                    </a>
                </div>
                <div class="">
                    <button id="product" class="button_sidebar product_active">
                        <p class=""><ion-icon class="icon_sidebar" name="bag-outline"></ion-icon>Sản phẩm</p>
                        <ion-icon name="chevron-forward-outline" class="chevron-icon"></ion-icon>
                    </button>
                    <a class="w-full button-none" id="product_list" href="{{ route('product') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class="mr-3"></ion-icon>Danh sách</button></a>
                    <a class="w-full button-none" id="product_add" href="{{ route('add_product') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class="mr-3"></ion-icon>Thêm</button></a>
                </div>
                <div class="">
                    <button id="category" class="button_sidebar category_active">
                        <p><ion-icon class="icon_sidebar" name="cube-outline"></ion-icon>Loại</p>
                        <ion-icon name="chevron-forward-outline" class="chevron-icon"></ion-icon>
                    </button>
                    <a class="w-full button-none" id="category_list" href="{{ route('category') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class="mr-3"></ion-icon>Danh sách</button></a>
                    <a class="w-full button-none" id="category_add" href="{{ route('category.create') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class="mr-3"></ion-icon>Thêm</button></a>
                </div>
                <div class="">
                    <button id="brand" class="button_sidebar brand_active">
                        <p><ion-icon class="icon_sidebar" name="bookmarks-outline"></ion-icon>Thương hiệu</p>
                        <ion-icon name="chevron-forward-outline" class="chevron-icon"></ion-icon>
                    </button>
                    <a class="w-full button-none" id="brand_list" href="{{ route('brand') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class="mr-3"></ion-icon>Danh sách</button></a>
                    <a class="w-full button-none" id="brand_add" href="{{ route('brand.create') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class="mr-3"></ion-icon>Thêm</button></a>
                </div>
                <div class="">
                    <button id="blog" class="button_sidebar blog_active">
                        <p><ion-icon class="icon_sidebar" name="create-outline"></ion-icon>Bài viết</p>
                        <ion-icon name="chevron-forward-outline" class="chevron-icon"></ion-icon>
                    </button>
                    <a class="w-full button-none" id="blog_list" href="{{ route('blog') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class="mr-3"></ion-icon>Danh sách</button></a>
                    <a class="w-full button-none" id="blog_add" href="{{ route('blog_category') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class="mr-3"></ion-icon>Danh mục</button></a>
                </div>
                <div class="">
                    <button id="order" class="button_sidebar order_active">
                        <p><ion-icon class="icon_sidebar" name="document-text-outline"></ion-icon>Đơn hàng</p>
                        <ion-icon name="chevron-forward-outline" class="chevron-icon"></ion-icon>
                    </button>
                    <a class="w-full button-none" id="order_list" href="{{ route('order') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class="mr-3"></ion-icon>Danh sách</button></a>
                </div>
                <div class="">
                    <button id="user" class="button_sidebar user_active">
                        <p><ion-icon class="icon_sidebar" name="person-outline"></ion-icon>Người dùng</p>
                        <ion-icon name="chevron-forward-outline" class="chevron-icon"></ion-icon>
                    </button>
                    <a class="w-full button-none" id="user_list" href="{{ route('user') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class="mr-3"></ion-icon>Danh sách</button></a>
                    <a class="w-full button-none" id="user_add" href="{{ route('add_user') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class="mr-3"></ion-icon>Thêm</button></a>
                </div>
                <div class="">
                    <button id="voucher" class="button_sidebar voucher_active">
                        <p><ion-icon class="icon_sidebar" name="receipt-outline"></ion-icon>Mã giảm giá</p>
                        <ion-icon name="chevron-forward-outline" class="chevron-icon"></ion-icon>
                    </button>
                    <a class="w-full button-none" id="voucher_list" href="{{ route('vouchers.index') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class="mr-3"></ion-icon>Danh sách</button></a>
                    <a class="w-full button-none" id="voucher_add" href="{{ route('vouchers.create') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class="mr-3"></ion-icon>Thêm</button></a>
                </div>
                <div class="">
                    <button id="setting" class="button_sidebar setting_active">
                        <p><ion-icon class="icon_sidebar" name="settings-outline"></ion-icon>Cài đặt</p>
                        <ion-icon name="chevron-forward-outline" class="chevron-icon"></ion-icon>
                    </button>
                    <a class="w-full button-none" id="setting_list" href="{{ route('settings.index') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class="mr-3"></ion-icon>Trang chính</button></a>
                    <a class="w-full button-none" id="setting_add" href="{{ route('menu.index') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class="mr-3"></ion-icon>Menu</button></a>
                </div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const buttons = document.querySelectorAll('.button_sidebar');
                    const links = document.querySelectorAll('div > a.button-none');
                    links.forEach(link => {
                        link.style.display = 'none';
                    });
                    buttons.forEach(button => {
                        button.addEventListener('click', () => {
                            const buttonId = button.id;
                            let isActive = false;
                            links.forEach(link => {
                                if (link.id === `${buttonId}_list` || link.id === `${buttonId}_add`) {
                                    if (link.style.display === 'inline-block') {
                                        link.style.display = 'none';
                                    } else {
                                        link.style.display = 'inline-block';
                                        isActive = true;
                                    }
                                } else {
                                    link.style.display = 'none';
                                }
                            });
                            const icon = button.querySelector('.chevron-icon');
                            if (icon) {
                                icon.setAttribute('name', isActive ? 'chevron-down-outline' : 'chevron-forward-outline');
                            }
                            buttons.forEach(otherButton => {
                                if (otherButton !== button) {
                                    otherButton.classList.remove('active');
                                    const otherIcon = otherButton.querySelector('.chevron-icon');
                                    if (otherIcon) {
                                        otherIcon.setAttribute('name', 'chevron-forward-outline');
                                    }
                                } else {
                                    if (!isActive) {
                                        button.classList.remove('active');
                                    }
                                }
                            });
                        });
                    });
                });
            </script>

        </div>
        <div class="flex-grow">
            <div class="min-h-16 bg-slate-800 flex justify-between items-center fixed z-30 w-screen">
                <div class="flex justify-between items-center">
                    <button @click="sidebarOpen = !sidebarOpen" class="text-3xl text-white z-40 ml-4"><ion-icon name="menu"></ion-icon></button>
                    <div class="flex justify-between items-center z-40">
                        <h1 class="mx-8 text-white">WELCOME</h1>
                        <div class="hidden md:block">
                            <div class="flex items-center">
                                <div class="relative ml-3" x-data="{ open: false }">
                                    <div>
                                        <button type="button" @click="open = !open" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                            <span class="absolute -inset-1.5"></span>
                                            <span class="sr-only">Open user menu</span>
                                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                        </button>
                                    </div>
                                    <div x-show="open" @click.away="open = false" class="absolute z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" style="left: 50%; transform: translateX(-50%);" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Thông tin tài khoản</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Cài đặt</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Đăng xuất</a>
                                    </div>
                                </div>
                                <button type="button" id="notificationButton" class="relative ml-8 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">View notifications</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                document.getElementById('user-menu-button').addEventListener('click', function() {
                                    var menu = document.getElementById('user-menu-button').nextElementSibling;
                                    menu.classList.toggle('hidden');
                                });
                                document.getElementById('notificationButton').addEventListener('click', function() {
                                    console.log('Show notifications');
                                });
                            });
                        </script>
                        <!-- <ion-icon name="build-outline" class="text-2xl text-white mx-6"></ion-icon>
                        <ion-icon name="notifications-circle" class="text-3xl text-white"></ion-icon> -->
                    </div>
                </div>
            </div>