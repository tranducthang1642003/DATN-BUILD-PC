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


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link href="https://unpkg.com/@mui/material@5.9.2/dist/material-ui.min.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body>
    <div class="grid grid-cols-12 bg-gray-200">
        <div class="col-span-2 p-4 bg-white">
            <div class="flex items-end justify-end">
                <button class="text-3xl"><ion-icon name="menu-outline"></ion-icon></button>
            </div>
            <div class="flex items-center justify-center mb-8">
                <img src="{{ asset('image/logo.svg') }}" alt="">
            </div>
            <div>
                <a href="../../admin"><button class="button_sidebar dashboard_active"><ion-icon class="icon_sidebar" name="logo-microsoft"></ion-icon>Dashboard</button></a>
                <a href="../../admin/product"><button class="button_sidebar products_active"><ion-icon class="icon_sidebar" name="bag"></ion-icon>Products</button></a>
                <a href="../../admin"><button class="button_sidebar categories_active"><ion-icon class="icon_sidebar" name="cube"></ion-icon>Categories</button></a>
                <button class="button_sidebar"><ion-icon class="icon_sidebar" name="document-text"></ion-icon>Orders</button>
                <button class="button_sidebar"><ion-icon class="icon_sidebar" name="person"></ion-icon>Customers</button>
                <button class="button_sidebar"><ion-icon class="icon_sidebar" name="layers"></ion-icon>Posts</button>
                <button class="button_sidebar"><ion-icon class="icon_sidebar" name="receipt"></ion-icon>Voucher</button>
                <button class="button_sidebar"><ion-icon class="icon_sidebar" name="bookmarks"></ion-icon>trademark</button>
            </div>
        </div>