<style>
    .dashboard_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>
@include('admin.layout.header')
<div class="m-4 mt-20">
    @php
    $yesterday = \Carbon\Carbon::now()->subDay();
    $thirtyDaysAgo = \Carbon\Carbon::now()->subDays(30);
    @endphp
    <h1 class="font-bold text-xl">Tháng này</h1>
    <p>{{ $thirtyDaysAgo->format('d/m/Y') }} - {{ $yesterday->format('d/m/Y') }}</p>
    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 md:grid-cols-4 gap-6 my-4">
        <div class="col-span-1 card_dashboard" id="revenueCard">
            <div class="h-48 sm:h-36 bg-gradient-to-r from-orange-500 to-orange-300 rounded-t-xl text-white">
                <div class="p-4">
                    <div>
                        <span class="text-sm sm:text-base">Doanh thu</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl sm:text-2xl">{{ number_format($totalRevenueCurrentMonth) }}VNĐ</h1>
                        <ion-icon name="logo-usd" class="text-4xl"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="h-12 sm:h-10 flex justify-between px-4 items-center text-xs">
                <span class="text-gray-700">Tháng trước: {{ number_format($totalRevenueLastMonth) }}VNĐ</span>
                <span class="text-lime-700">{{ number_format($rateRevenue, 2) }}%</span>
            </div>
        </div>
        <div class="col-span-1 card_dashboard" id="newOrdersCard">
            <div class="h-48 sm:h-36 bg-gradient-to-r from-violet-800 to-violet-500 rounded-t-xl text-white">
                <div class="p-4">
                    <div>
                        <span class="text-sm sm:text-base">Đơn hàng mới</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl sm:text-2xl">{{ number_format($totalOrdersCurrentMonth) }}</h1>
                        <ion-icon name="newspaper-outline" class="text-4xl"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="h-12 sm:h-10 flex justify-between px-4 items-center text-xs">
                <span class="text-gray-700">Tháng trước: {{ number_format($totalOrdersLastMonth) }}</span>
                <span class="text-red-600">{{ number_format($rateOrders, 2) }}%</span>
            </div>
        </div>
        <div class="col-span-1 card_dashboard" id="soldProductsCard">
            <div class="h-48 sm:h-36 bg-gradient-to-r from-cyan-600 to-cyan-400 rounded-t-xl text-white">
                <div class="p-4">
                    <div>
                        <span class="text-sm sm:text-base">Sản phẩm đã bán</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl sm:text-2xl">{{ number_format($totalProductsSoldCurrentMonth) }}</h1>
                        <ion-icon class="text-4xl" name="bag"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="h-12 sm:h-10 flex justify-between px-4 items-center text-xs">
                <span class="text-gray-700">Tháng trước: {{ number_format($totalProductsSoldLastMonth) }}</span>
                <span class="text-lime-700">{{ number_format($rateProducts, 2) }}%</span>
            </div>
        </div>
        <div class="col-span-1 card_dashboard" id="newCustomersCard">
            <div class="h-48 sm:h-36 bg-gradient-to-r from-fuchsia-800 to-fuchsia-500 rounded-t-xl text-white">
                <div class="p-4">
                    <div>
                        <span class="text-sm sm:text-base">Khách hàng mới</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl sm:text-2xl">{{ number_format($newUsersCountCurrentMonth) }}</h1>
                        <ion-icon name="people-circle-outline" class="text-4xl"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="h-12 sm:h-10 flex justify-between px-4 items-center text-xs">
                <span class="text-gray-700">Tháng trước: {{ number_format($newUsersCountLastMonth) }}</span>
                <span class="text-lime-700">{{ number_format($rateUsers, 2) }}%</span>
            </div>
        </div>
    </div>
    <canvas id="revenueCanvas" class="h-20 sm:h-20 bg-white rounded-lg" width="300" height="150"></canvas>
    <canvas id="newOrdersCanvas" class="h-20 sm:h-20 bg-white rounded-lg"></canvas>
    <canvas id="soldProductsCanvas" class="h-20 sm:h-20 bg-white rounded-lg"></canvas>
    <canvas id="newCustomersCanvas" class="h-20 sm:h-20 bg-white rounded-lg"></canvas>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var revenueCtx = document.getElementById('revenueCanvas').getContext('2d');
        revenueCtx.width = 200;
        revenueCtx.height = 200;
        var newOrdersCtx = document.getElementById('newOrdersCanvas').getContext('2d');
        var soldProductsCtx = document.getElementById('soldProductsCanvas').getContext('2d');
        var newCustomersCtx = document.getElementById('newCustomersCanvas').getContext('2d');

        var revenueData = {!! $currentMonthRevenueData !!};
        var newOrdersData = {!! $currentMonthOrdersData !!};
        var soldProductsData = {!! $currentMonthSoldProductsData !!};
        var newCustomersData = {!! $currentMonthNewCustomersData !!};
        var labelsData = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'];
        var chartOptions = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        var revenueChart = new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: labelsData,
                datasets: [{
                    label: 'Doanh thu',
                    data: revenueData.data,
                    backgroundColor: '#f97316',
                }]
            },
            options: chartOptions
        });

        var newOrdersChart = new Chart(newOrdersCtx, {
            type: 'bar',
            data: {
                labels: labelsData,
                datasets: [{
                    label: 'Đơn hàng mới',
                    data: newOrdersData.data,
                    backgroundColor: '#5b21b6',
                }]
            },
            options: chartOptions
        });

        var soldProductsChart = new Chart(soldProductsCtx, {
            type: 'bar',
            data: {
                labels: labelsData,
                datasets: [{
                    label: 'Sản phẩm đã bán',
                    data: soldProductsData.data,
                    backgroundColor: '#0891b2',
                }]
            },
            options: chartOptions
        });

        var newCustomersChart = new Chart(newCustomersCtx, {
            type: 'bar',
            data: {
                labels: labelsData,
                datasets: [{
                    label: 'Khách hàng mới',
                    data: newCustomersData.data,
                    backgroundColor: '#86198f',
                }]
            },
            options: chartOptions
        });
    });
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
</script>
</div>
@include('admin.layout.fotter')