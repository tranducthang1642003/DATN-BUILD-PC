<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Tailwind CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.tailwindcss.com/2.2.19/tailwind.min.css" rel="stylesheet">

    <!-- MUI (Material-UI) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link href="https://unpkg.com/@mui/material@5.9.2/dist/material-ui.min.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <div class="grid grid-cols-12 bg-gray-200 text-lg gap-6">
        <div class="col-span-2 p-4 bg-white">
            <div class="flex items-end justify-end">
                <button class="text-3xl"><ion-icon name="menu-outline"></ion-icon></button>
            </div>
            <div class="flex items-center justify-center mb-8">
                <img src="{{ asset('image/logo.png') }}" alt="">
            </div>
            <div>
                <button class="button_sidebar button_active"><ion-icon class="icon_sidebar" name="logo-microsoft"></ion-icon>Dashboard</button>
                <button class="button_sidebar"><ion-icon class="icon_sidebar" name="bag"></ion-icon>Products</button>
                <button class="button_sidebar"><ion-icon class="icon_sidebar" name="cube"></ion-icon>Categories</button>
                <button class="button_sidebar"><ion-icon class="icon_sidebar" name="document-text"></ion-icon>Orders</button>
                <button class="button_sidebar"><ion-icon class="icon_sidebar" name="person"></ion-icon>Customers</button>
                <button class="button_sidebar"><ion-icon class="icon_sidebar" name="layers"></ion-icon>Posts</button>
                <button class="button_sidebar"><ion-icon class="icon_sidebar" name="receipt"></ion-icon>Voucher</button>
                <button class="button_sidebar"><ion-icon class="icon_sidebar" name="bookmarks"></ion-icon>trademark</button>
            </div>
        </div>
        <div class="col-span-10">
            @yield('content')
            
        </div>
    </div>

    <script>
        import AccessTimeIcon from '@mui/icons-material/AccessTime';
    </script>
</body>

</html>