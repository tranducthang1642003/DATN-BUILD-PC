@include('public.header.index')
<style>
    .bg-yellow-100 {
        background-color: #BFDBFE;
    }
    .border-yellow-500 {
        border-color: #FBBF24;
    }
</style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <div class="grid grid-cols-10 gap-4">
            <div class="bg-white p-4 col-span-3 rounded-md shadow-md">
                <ul class="space-y-2">
                    <li class="px-4 py-2 rounded-md hover:bg-blue-100 border-b border-yellow-500" onclick="changeTab(this, 'dashboard')">
                        <i class="fa-solid fa-gauge mr-2"></i> Dashboard
                    </li>
                    <li class="px-4 py-2 rounded-md hover:bg-blue-100 border-b border-yellow-500" onclick="changeTab(this, 'like')">
                        <i class="fa-solid fa-heart mr-2"></i> Like
                    </li>
                    <li class="px-4 py-2 rounded-md hover:bg-blue-100 border-b border-yellow-500" onclick="changeTab(this, 'orders')">
                        <i class="fa-solid fa-cart-arrow-down mr-2"></i> My Orders
                    </li>
                    <li class="px-4 py-2 rounded-md hover:bg-blue-100 border-b border-yellow-500" onclick="changeTab(this, 'logout')">
                       <form method="POST" action="/logout">
                        @csrf
                        <i class="fa-solid fa-right-from-bracket mr-2"></i><button type="submit" class="logout-btn">Logout</button>
                    </form>
                    </li>
                </ul>
            </div>