<style>
    .dashboard_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
    element.style {
        width: 500px;
    }
    .chart-container {
        width: 80%;
        margin: 0 auto;
    }
</style>
@include('admin.layout.header')
<div class="pt-20 text-slate-200 w-4/6 mx-8">
    @php
    $yesterday = \Carbon\Carbon::now()->subDay();
    $thirtyDaysAgo = \Carbon\Carbon::now()->subDays(30);
    @endphp
    <h1 class="font-bold text-xl">Tháng này</h1>
    <p>{{ $thirtyDaysAgo->format('d/m/Y') }} - {{ $yesterday->format('d/m/Y') }}</p>
    <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-4 md:grid-cols-2 gap-6 my-4">
        <div class="col-span-1 card_dashboard" id="revenueCard">
            <div class="revenue h-48 sm:h-36 bg-gradient-to-r rounded-t-xl text-white">
                <div class="p-4 flex justify-between items-center">
                    <div>
                        <span class="text-sm sm:text-base">Doanh thu</span>
                        <h1 class="text-xl sm:text-xl">{{ number_format($totalRevenueCurrentMonth) }}VNĐ</h1>
                    </div>
                    <ion-icon name="logo-usd" class="text-4xl"></ion-icon>
                </div>
            </div>
            <!-- <div class="h-12 sm:h-10 flex justify-between px-4 items-center text-xs bg-slate-300">
                <span class="text-gray-700">Tháng trước: {{ number_format($totalRevenueLastMonth) }}VNĐ</span>
                <span class=" {{ $rateRevenue > 0 ? 'text-lime-700' : 'text-red-700' }}">{{ number_format($rateRevenue, 2) }}%</span>
            </div> -->
        </div>
        <div class="col-span-1 card_dashboard" id="newOrdersCard">
            <div class="order h-48 sm:h-36 bg-gradient-to-r rounded-t-xl text-white">
                <div class="p-4 flex justify-between items-center">
                    <div class="">
                        <p class="text-sm sm:text-base">Đơn hàng mới</p>
                        <h1 class="text-xl sm:text-xl">{{ number_format($totalOrdersCurrentMonth) }}</h1>
                    </div>
                    <ion-icon name="newspaper-outline" class="text-4xl"></ion-icon>
                </div>
            </div>
            <!-- <div class="h-12 sm:h-10 flex justify-between px-4 items-center text-xs bg-slate-300">
                <span class="text-gray-700">Tháng trước: {{ number_format($totalOrdersLastMonth) }}</span>
                <span class="{{ $rateOrders > 0 ? 'text-lime-700' : 'text-red-700' }}">{{ number_format($rateOrders, 2) }}%</span>
            </div> -->
        </div>
        <div class="col-span-1 card_dashboard" id="soldProductsCard">
            <div class="product h-48 sm:h-36 bg-gradient-to-r rounded-t-xl text-white">
                <div class="p-4 flex justify-between items-center">
                    <div>
                        <span class="text-sm sm:text-base">Sản phẩm đã bán</span>
                        <h1 class="text-xl sm:text-xl">{{ number_format($totalProductsSoldCurrentMonth) }}</h1>
                    </div>
                    <ion-icon class="text-4xl" name="bag"></ion-icon>
                </div>
            </div>
            <!-- <div class="h-12 sm:h-10 flex justify-between px-4 items-center text-xs bg-slate-300">
                <span class="text-gray-700">Tháng trước: {{ number_format($totalProductsSoldLastMonth) }}</span>
                <span class="{{ $rateProducts > 0 ? 'text-lime-700' : 'text-red-700' }}">{{ number_format($rateProducts, 2) }}%</span>
            </div> -->
        </div>
        <div class="col-span-1 card_dashboard" id="newCustomersCard">
            <div class="user h-48 sm:h-36 bg-gradient-to-r rounded-t-xl text-white">
                <div class="p-4 flex justify-between items-center">
                    <div>
                        <span class="text-sm sm:text-base">Khách hàng mới</span>
                        <h1 class="text-2xl sm:text-2xl">{{ number_format($newUsersCountCurrentMonth) }}</h1>
                    </div>
                    <ion-icon name="people-circle-outline" class="text-4xl"></ion-icon>
                </div>
            </div>
            <!-- <div class="h-12 sm:h-10 flex justify-between px-4 items-center text-xs bg-slate-300">
                <span class="text-gray-700">Tháng trước: {{ number_format($newUsersCountLastMonth) }}</span>
                <span class="{{ $rateUsers > 0 ? 'text-lime-700' : 'text-red-700' }}">{{ number_format($rateUsers, 2) }}%</span>
            </div> -->
        </div>
    </div>
    <canvas id="revenueCanvas" class="h-20 sm:h-20 bg-white rounded-lg" width="300" height="150"></canvas>
    <canvas id="newOrdersCanvas" class="h-20 sm:h-20 bg-white rounded-lg"></canvas>
    <canvas id="soldProductsCanvas" class="h-20 sm:h-20 bg-white rounded-lg"></canvas>
    <canvas id="newCustomersCanvas" class="h-20 sm:h-20 bg-white rounded-lg"></canvas>
    <div class="w-full my-4 grid grid-cols-2 gap-4">
        <div class="col-span-1 bg-main">
            <h1 class="text-center text-lg m-4">Top 5 sản phẩm bán chạy</h1>
            @foreach($topProductDetailsByQuantity as $topQuantity)
                <div class="relative text-slate-300">
                    <hr>
                    <div class="flex">
                        <div class="m-4">
                            <img src="{{ asset($topQuantity->primaryImage->image_path ?? 'placeholder.jpg') }}" alt="" width="50" height="50" class="rounded-full">
                        </div>
                        <div class="mt-5">
                            <p>{{ Illuminate\Support\Str::limit($topQuantity->product_name, 40) }}</p>
                            <span class="text-slate-400">{{ Illuminate\Support\Str::limit($topQuantity->product_code, 60) }}</span>
                        </div>
                    </div>
                    <div class="bg-red-500 w-max absolute top-4 right-4">{{ $topQuantity->sold_quantity }} lượt bán</div>
                </div>
            @endforeach
        </div>
        <div class="col-span-1 bg-main">
            <h1 class="text-center text-lg m-4">Top 5 sản phẩm có doanh thu cao nhất</h1>
            @foreach($topProductDetailsByRevenue as $topRevenue)
                <div class="relative text-slate-300">
                    <hr>
                    <div class="flex">
                        <div class="m-4">
                            <img src="{{ asset($topRevenue->primaryImage->image_path ?? 'placeholder.jpg') }}" alt="" width="50" height="50" class="rounded-full">
                        </div>
                        <div class="mt-5">
                            <p>{{ Illuminate\Support\Str::limit($topRevenue->product_name, 40) }}</p>
                            <span class="text-slate-400">{{ Illuminate\Support\Str::limit($topRevenue->product_code, 60) }}</span>
                        </div>
                    </div>
                    <div class="bg-red-500 w-max absolute top-4 right-4">{{ number_format($topRevenue->total_revenue) }} VND</div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="w-2/6 h-screen bg-dark mt-36">
    <div class="w-full" style="height: 450px;">
        <div id="statusChart" style="width: 30px; height: 30px;">
    </div>
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
        function formatLabels(labels) {
            return labels.map(function(label) {
            var parts = label.split('-');
            return parts[2] + '/' + parts[1];
        });
}
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
                labels: formatLabels(revenueData.labels),
                datasets: [{
                    label: 'Doanh thu',
                    data: revenueData.data,
                    backgroundColor: '#f67f08',
                }]
            },
            options: chartOptions
        });

        var newOrdersChart = new Chart(newOrdersCtx, {
            type: 'bar',
            data: {
                labels: formatLabels(newOrdersData.labels),
                datasets: [{
                    label: 'Đơn hàng mới',
                    data: newOrdersData.data,
                    backgroundColor: '#e83e8c',
                }]
            },
            options: chartOptions
        });

        var soldProductsChart = new Chart(soldProductsCtx, {
            type: 'bar',
            data: {
                labels: formatLabels(soldProductsData.labels),
                datasets: [{
                    label: 'Sản phẩm đã bán',
                    data: soldProductsData.data,
                    backgroundColor: '#8d6658',
                }]
            },
            options: chartOptions
        });

        var newCustomersChart = new Chart(newCustomersCtx, {
            type: 'bar',
            data: {
                labels: formatLabels(newCustomersData.labels),
                datasets: [{
                    label: 'Khách hàng mới',
                    data: newCustomersData.data,
                    backgroundColor: '#7460ee',
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
<script>
    // bieu do tron
    document.addEventListener('DOMContentLoaded', function() {
    // Dữ liệu từ PHP
    const statuses = {!! json_encode($statuses) !!};

    // Chuyển đổi dữ liệu thành định dạng mà Plotly yêu cầu
    const labels = Object.keys(statuses);
    const values = Object.values(statuses);

    // Dữ liệu cho biểu đồ tròn
    const data = [{
        values: values,
        labels: labels,
        type: 'pie',
        marker: {
            colors: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
        }
    }];

    // Tùy chọn cho biểu đồ
    const layout = {
        title: 'Tình trạng đơn hàng',
        height: 450,
        width: 500,
    };

    // Vẽ biểu đồ
    Plotly.newPlot('statusChart', data, layout);
});

    </script>
</div>
@include('admin.layout.fotter')