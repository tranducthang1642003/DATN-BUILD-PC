<style>
    .dashboard_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>
@include('admin.layout.header')
<div class="flex-grow p-5 ml-10">
    <h1 class=" font-bold text-xl">This month</h1>
    <div class="grid grid-cols-12 gap-6 my-4">
        <div class="col-span-3  card_dashboard">
            <div class="h-3/4 bg-gradient-to-r from-orange-500 to-orange-300 rounded-t-xl text-white">
                <div class="p-4">
                    <div class="">
                        <span class="">Revenue</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl">11,132,123</h1>
                        <ion-icon name="logo-usd" class="text-3xl"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="h-1/4 flex justify-between px-4 items-center text-xs">
                <span class="text-gray-700">Last month: 2,122,123,123</span>
                <span class="text-lime-700">+12%</span>
            </div>
        </div>
        <div class="col-span-3  card_dashboard">
            <div class="h-3/4 bg-gradient-to-r from-violet-800 to-violet-500 rounded-t-xl text-white">
                <div class="p-4">
                    <div class="">
                        <span class="">New Orders</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl">12</h1>
                        <ion-icon name="newspaper-outline" class="text-3xl"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="h-1/4 flex justify-between px-4 items-center text-xs">
                <span class="text-gray-700">Last month: 24</span>
                <span class="text-red-600">-10%</span>
            </div>
        </div>
        <div class="col-span-3  card_dashboard">
            <div class="h-3/4 bg-gradient-to-r from-cyan-600 to-cyan-400 rounded-t-xl text-white">
                <div class="p-4">
                    <div class="">
                        <span class="">Sold Products</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl">952</h1>
                        <ion-icon class="text-3xl" name="bag"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="h-1/4 flex justify-between px-4 items-center text-xs">
                <span class="text-gray-700">Last month: 800</span>
                <span class="text-lime-700">+12%</span>
            </div>
        </div>
        <div class="col-span-3  card_dashboard">
            <div class="h-3/4 bg-gradient-to-r from-fuchsia-800 to-fuchsia-500 rounded-t-xl text-white">
                <div class="p-4">
                    <div class="">
                        <span class="">New Customers</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl">100</h1>
                        <ion-icon name="people-circle-outline" class="text-3xl"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="h-1/4 flex justify-between px-4 items-center text-xs">
                <span class="text-gray-700">Last month: 92</span>
                <span class="text-lime-700">+12%</span>
            </div>
        </div>
    </div>
    <canvas id="myChart" class=" h-28"></canvas>
</div>
@include('admin.layout.fotter')