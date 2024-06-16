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
        <div class="col-span-3  card_dashboard " id="revenueCard">
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
        <div class="col-span-3  card_dashboard" id="newOrdersCard">
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
        <div class="col-span-3  card_dashboard" id="soldProductsCard">
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
        <div class="col-span-3  card_dashboard" id="newCustomersCard">
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
    <canvas id="revenueCanvas" class="h-28"></canvas>
    <canvas id="newOrdersCanvas" class="h-28"></canvas>
    <canvas id="soldProductsCanvas" class="h-28"></canvas>
    <canvas id="newCustomersCanvas" class="h-28"></canvas>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Khởi tạo các biểu đồ
        var revenueCtx = document.getElementById('revenueCanvas').getContext('2d');
        var newOrdersCtx = document.getElementById('newOrdersCanvas').getContext('2d');
        var soldProductsCtx = document.getElementById('soldProductsCanvas').getContext('2d');
        var newCustomersCtx = document.getElementById('newCustomersCanvas').getContext('2d');

        var revenueData = {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11',
                '12', '13', '14', '15', '16', '17', '18', '19', '20', '21',
                '22', '23', '24', '25', '26', '27', '27', '29', '30', '31'
            ],
            datasets: [{
                label: 'Revenue',
                data: [
                    158, 124, 187, 100, 85, 55, 40, 120, 59, 80, 158, 142,
                    110, 40, 65, 98, 80, 81, 55, 114, 98, 65, 59, 80, 81,
                    125, 114, 40, 21, 22, 44
                ],
                backgroundColor: '#f97316 ',
            }]
        };

        var newOrdersData = {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11',
                '12', '13', '14', '15', '16', '17', '18', '19', '20', '21',
                '22', '23', '24', '25', '26', '27', '27', '29', '30', '31'
            ],
            datasets: [{
                label: 'New Orders',
                data: [
                    20, 21, 29, 23, 21, 25, 18, 14, 21, 21, 36, 25,
                    26, 19, 17, 6, 12, 9, 14, 15, 21, 8,
                    9, 10, 16, 21, 22, 8, 5, 25, 12
                ],
                backgroundColor: '#5b21b6',
            }]
        };

        var soldProductsData = {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11',
                '12', '13', '14', '15', '16', '17', '18', '19', '20', '21',
                '22', '23', '24', '25', '26', '27', '27', '29', '30', '31'
            ],
            datasets: [{
                label: 'Sold Products',
                data: [
                    158, 124, 187, 100, 85, 55, 40, 120, 59, 80, 158, 142,
                    110, 40, 65, 98, 80, 81, 55, 114, 98, 65, 59, 80, 81,
                    125, 114, 40, 21, 22, 44
                ],
                backgroundColor: '#0891b2',
            }]
        };

        var newCustomersData = {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11',
                '12', '13', '14', '15', '16', '17', '18', '19', '20', '21',
                '22', '23', '24', '25', '26', '27', '27', '29', '30', '31'
            ],
            datasets: [{
                label: 'New Customers',
                data: [
                    20, 21, 29, 23, 21, 25, 18, 14, 21, 21, 36, 25,
                    26, 19, 17, 6, 12, 9, 14, 15, 21, 8,
                    9, 10, 16, 21, 22, 8, 5, 25, 12
                ],
                backgroundColor: '#86198f',
            }]
        };

        var chartOptions = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        var revenueChart = new Chart(revenueCtx, {
            type: 'bar',
            data: revenueData,
            options: chartOptions
        });

        var newOrdersChart = new Chart(newOrdersCtx, {
            type: 'bar',
            data: newOrdersData,
            options: chartOptions
        });

        var soldProductsChart = new Chart(soldProductsCtx, {
            type: 'bar',
            data: soldProductsData,
            options: chartOptions
        });

        var newCustomersChart = new Chart(newCustomersCtx, {
            type: 'bar',
            data: newCustomersData,
            options: chartOptions
        });

        // Ẩn tất cả các biểu đồ ban đầu trừ biểu đồ của revenueCard
        hideAllCharts();
        document.getElementById('revenueCanvas').style.display = 'block';

        // Lắng nghe sự kiện click vào mỗi card để hiển thị biểu đồ tương ứng
        document.getElementById('revenueCard').addEventListener('click', function() {
            hideAllCharts();
            document.getElementById('revenueCanvas').style.display = 'block';
        });

        document.getElementById('newOrdersCard').addEventListener('click', function() {
            hideAllCharts();
            document.getElementById('newOrdersCanvas').style.display = 'block';
        });

        document.getElementById('soldProductsCard').addEventListener('click', function() {
            hideAllCharts();
            document.getElementById('soldProductsCanvas').style.display = 'block';
        });

        document.getElementById('newCustomersCard').addEventListener('click', function() {
            hideAllCharts();
            document.getElementById('newCustomersCanvas').style.display = 'block';
        });

        // Hàm ẩn tất cả các biểu đồ
        function hideAllCharts() {
            var charts = document.querySelectorAll('canvas');
            for (var i = 0; i < charts.length; i++) {
                charts[i].style.display = 'none';
            }
        }
    });
</script>
@include('admin.layout.fotter')