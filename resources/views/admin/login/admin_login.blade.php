<style>
    .login {
        position: relative;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://hoanghamobile.com/tin-tuc/wp-content/uploads/2023/09/hinh-nen-may-tinh-4k-cong-nghe-4.jpg');
        background-size: cover;
        background-position: center;
        font-family: Arial, sans-serif;
    }
</style>
  <div class="login min-h-screen bg-gray-100 flex items-center  justify-center ">
    <div class="w-9/12">
        <div class="rounded-md flex flex-col sm:flex-row">
            <div class="md:w-1/2 bg-white rounded-lg shadow-md overflow-hidden flex flex-col justify-center items-center relative">
                <img src="https://hoanghamobile.com/tin-tuc/wp-content/uploads/2023/09/hinh-nen-may-tinh-4k-cong-nghe-4.jpg" alt="Image" class="h-full w-full max-w object-cover">
                <p class="image-text text-sm md:text-lg lg:text-xl xl:text-2xl 2xl:text-3xl absolute top-2/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-white font-bold bg-opacity-75 px-6 py-4 rounded-lg mb-6">WELCOME!</p>
                <p class="image-text text-sm md:text-lg lg:text-xl xl:text-2xl 2xl:text-3xl absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-white font-bold bg-opacity-75 px-6 py-4 rounded-lg mt-3">Please log in to continue.</p>
              </div>
            <div class="md:w-1/2 sm:px-6 py-4 bg-white rounded-lg bg-opacity-60">
                <h2 class="text-2xl font-bold mb-6 text-center">LOGIN</h2>
                <div class="text-center">
                    <div class="flex items-center justify-center gap-2">
                        <button class="flex items-center justify-center w-8 h-8 bg-blue-500 hover:bg-blue-600 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"></button>
                        <button class="flex items-center justify-center w-8 h-8 bg-red-500 hover:bg-red-600 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"></button>
                    </div>
                    <p class="text-sm text-gray-600 mb-2">Or login with:</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                  <div class="mb-4">
                    <label for="gmail" class="block text-gray-700">Gmail:</label>
                    <input type="email" id="gmail" name="email" class="border border-gray-300 p-2 rounded w-full" required>
                </div>
                    <div class="mb-4">
                        <label for="gmail" class="block text-gray-700">password:</label>
                        <input type="password" id="password" name="password" class="border border-gray-300 p-2 rounded w-full" required>
                    </div>
                    <div class="flex items-center gap-2 p-5">
                      <input type="checkbox" id="save-password" class="h-4 w-4 text-blue-500 focus:ring-blue-500 border-gray-300 rounded">
                      <label for="save-password" class="text-sm sm:text-base text-gray-600">Có muốn lưu mật khẩu?</label>
                    </div>
                    <div class="flex items-center mt-3 justify-center">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-5">login</button>
                        <p class="ml-5">Bạn chưa có tài khoản? Hãy ấn <a href="{{route('register')}}" class="text-green-700">register</a>.</p>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
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

<body>
    <div x-data="{ sidebarOpen: true }" class=" flex text-sm-xs bg-slate-300">
        <div :class="{ 'block': sidebarOpen, 'hidden': !sidebarOpen }" class="p-4 drop-shadow-xl bg-slate-800 min-w-72 top-0 left-0 z-50 transition-transform duration-300 transform ">
            <div class="flex items-end justify-end">
                <button @click="sidebarOpen = !sidebarOpen" class="text-3xl z-50"><ion-icon name="close-outline"></ion-icon></button>
            </div>
            <div class="flex items-center justify-center mb-12 mt-2">
                <a href="{{ route('home') }}"><img src="{{ asset('image/logo.svg') }}" width="100" alt=""></a>
            </div>
            <div class="">
                <div class="mb-4">
                    <button id="dashboard" class="button_sidebar dashboard_active"><ion-icon class="icon_sidebar" name="logo-microsoft"></ion-icon>Dashboard</button>
                    <a class="w-full button-none" id="dashboard_list" href="{{ route('admin') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class=""></ion-icon>Danh sách</button></a>
                </div>
                <div class="mb-4">
                    <button id="product" class="button_sidebar product_active"><ion-icon class="icon_sidebar" name="bag"></ion-icon>Sản phẩm</button>
                    <a class="w-full button-none" id="product_list" href="{{ route('product') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class=""></ion-icon>Danh sách</button></a>
                    <a class="w-full button-none" id="product_add" href="{{ route('add_product') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class=""></ion-icon>Thêm</button></a>
                </div>
                <div class="mb-4">
                    <button id="category" class="button_sidebar category_active"><ion-icon class="icon_sidebar" name="cube"></ion-icon>Loại</button>
                    <a class="w-full button-none" id="category_list" href="{{ route('category') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class=""></ion-icon>Danh sách</button></a>
                    <a class="w-full button-none" id="category_add" href="{{ route('category.create') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class=""></ion-icon>Thêm</button></a>
                </div>
                <div class="mb-4">
                    <button id="brand" class="button_sidebar brand_active"><ion-icon class="icon_sidebar" name="bookmarks"></ion-icon>Thương hiệu</button>
                    <a class="w-full button-none" id="brand_list" href="{{ route('brand') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class=""></ion-icon>Danh sách</button></a>
                    <a class="w-full button-none" id="brand_add" href="{{ route('brand.create') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class=""></ion-icon>Thêm</button></a>
                </div>
                <div class="mb-4">
                    <button id="blog" class="button_sidebar blog_active"><ion-icon class="icon_sidebar" name="create"></ion-icon>Bài viết</button>
                    <a class="w-full button-none" id="blog_list" href="{{ route('blog') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class=""></ion-icon>Danh sách</button></a>
                    <a class="w-full button-none" id="blog_add" href="{{ route('add_blog') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class=""></ion-icon>Thêm</button></a>
                </div>
                <div class="mb-4">
                    <button id="order" class="button_sidebar order_active"><ion-icon class="icon_sidebar" name="document-text"></ion-icon>Đơn hàng</button>
                    <a class="w-full button-none" id="order_list" href="{{ route('order') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class=""></ion-icon>Danh sách</button></a>
                </div>
                <div class="mb-4">
                    <button id="user" class="button_sidebar user_active"><ion-icon class="icon_sidebar" name="person"></ion-icon>Người dùng</button>
                    <a class="w-full button-none" id="user_list" href="{{ route('user') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class=""></ion-icon>Danh sách</button></a>
                    <a class="w-full button-none" id="user_add" href="{{ route('add_user') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class=""></ion-icon>Thêm</button></a>
                </div>
                <div class="mb-4">
                    <button id="voucher" class="button_sidebar voucher_active"><ion-icon class="icon_sidebar" name="receipt"></ion-icon>Mã giảm giá</button>
                    <a class="w-full button-none" id="voucher_list" href="{{ route('voucher') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class=""></ion-icon>Danh sách</button></a>
                    <a class="w-full button-none" id="voucher_add" href="{{ route('add_voucher') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class=""></ion-icon>Thêm</button></a>
                </div>
                <div class="mb-4">
                    <button id="setting" class="button_sidebar setting_active"><ion-icon class="icon_sidebar" name="settings"></ion-icon>Cài đặt</button>
                    <a class="w-full button-none" id="setting_list" href="{{ route('banner') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class=""></ion-icon>Banner</button></a>
                    <a class="w-full button-none" id="setting_add" href="{{ route('add_banner') }}"><button class="button_sidebar_cl "><ion-icon name="caret-forward-outline" class=""></ion-icon>Thêm</button></a>
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
                            links.forEach(link => {
                                if (link.id === `${buttonId}_list` || link.id === `${buttonId}_add`) {
                                    link.style.display = link.style.display === 'inline-block' ? 'none' : 'inline-block';
                                } else {
                                    link.style.display = 'none';
                                }
                            });
                            if (document.getElementById(`${buttonId}_list`).style.display === 'inline-block') {
                                button.classList.add('active');
                            } else {
                                button.classList.remove('active');
                            }
                            buttons.forEach(otherButton => {
                                if (otherButton !== button) {
                                    otherButton.classList.remove('active');
                                }
                            });
                        });
                    });
                });
            </script>
        </div>
        <div class="flex-grow">
            <div class="min-h-16 bg-slate-800 flex justify-between items-center fixed w-full z-40">
                <h1 class="text-white ml-12">WELCOME</h1>
                <div class="flex justify-between items-center pr-8">
                    <ion-icon name="notifications-circle" class="text-3xl text-white mx-4"></ion-icon>
                    <ion-icon name="build-outline" class="text-2xl text-white mx-4"></ion-icon>
                    <img src="{{ asset('image/pc_demo.jpg') }}" width="50" alt="" class="rounded-full">
                </div>
            </div>