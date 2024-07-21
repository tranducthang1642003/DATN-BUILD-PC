<style>
    .dashboard_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
    element.style {
        width: 500px;
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
            <div class="product h-48 sm:h-36 bg-gradient-to-r from-cyan-600 to-cyan-400 rounded-t-xl text-white">
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
    <canvas id="revenueCanvas" class="h-20 sm:h-20 bg-gray-300 rounded-lg" width="300" height="150"></canvas>
    <canvas id="newOrdersCanvas" class="h-20 sm:h-20 bg-gray-300 rounded-lg"></canvas>
    <canvas id="soldProductsCanvas" class="h-20 sm:h-20 bg-gray-300 rounded-lg"></canvas>
    <canvas id="newCustomersCanvas" class="h-20 sm:h-20 bg-gray-300 rounded-lg"></canvas>
    <div class="w-full bg-main h-60 mt-4">

    </div>
</div>
<div class="w-2/6 h-screen bg-dark mt-36">
    <div class="h-1/3 bg-main mr-4 mb-4 flex">
        <div class="w-full">
            <h1 class="flex justify-center my-4 text-xl">Thống kê đơn hàng</h1>
            <div class="flex">
                <div class="m-4"><div id="chart1" class=""></div></div>
                <div class="">
                    <p class="mt-4"><ion-icon name="radio-button-on" style="color: orange;" ></ion-icon>Chưa giải quyết</p>
                    <p class="mt-4"><ion-icon name="radio-button-on" style="color: blue;"></ion-icon>Đang xử lý</p>
                    <p class="mt-4"><ion-icon name="radio-button-on" style="color: #4caf50;"></ion-icon>Đã hoàn thành</p>
                    <p class="mt-4"><ion-icon name="radio-button-on" style="color: red;"></ion-icon>Đã hủy</p>
                </div>
            </div>
        </div>
    </div>
    <div class="h-1/3 bg-main mr-4 flex" >
    <div class="w-full">
            <h1 class="flex justify-center my-4 text-xl">Lượng người truy cập</h1>
            <div id="chart2" class="m-4"></div>
        </div>
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
                    backgroundColor: '#f7941d',
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
                    backgroundColor: '#2962FF',
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
                    backgroundColor: '#4fc3f7',
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
    // Biểu đồ tròn (Pie Chart)
    const dataPie = [30, 20, 30, 20]; // Dữ liệu ví dụ

    const widthPie = 200;
    const heightPie = 200;
    const radiusPie = Math.min(widthPie, heightPie) / 2;

    const colorPie = d3.scaleOrdinal()
        .domain(["A", "B", "C", "D"]) // Các nhóm dữ liệu
        .range(["#98abc5", "#8a89a6", "#7b6888", "#4caf50"]); // Màu sắc tương ứng

    const pie = d3.pie()
        .sort(null)
        .value(d => d);

    const arc = d3.arc()
        .innerRadius(0)
        .outerRadius(radiusPie);

    const svgPie = d3.select("#chart1")
        .append("svg")
        .attr("width", widthPie)
        .attr("height", heightPie)
        .append("g")
        .attr("transform", `translate(${widthPie / 2},${heightPie / 2})`);

    const gPie = svgPie.selectAll(".arc")
        .data(pie(dataPie))
        .enter().append("g")
        .attr("class", "arc");

    gPie.append("path")
        .attr("d", arc)
        .style("fill", d => colorPie(d.data));

    // Biểu đồ sóng (Wave Chart)
    const dataWave = [10, 20, 15, 30, 25, 20, 18]; // Dữ liệu cho 7 ngày, ví dụ
    const dates = ["07-15", "07-16", "07-17", "07-18", "07-19", "07-20", "07-21"]; // Ngày tháng tương ứng với dữ liệu

    const margin = { top: 20, right: 20, bottom: 30, left: 40 };
    const widthWave = 400 - margin.left - margin.right;
    const heightWave = 200 - margin.top - margin.bottom;

    const xWave = d3.scaleBand()
        .domain(dates)
        .range([0, widthWave])
        .padding(0.1);

    const yWave = d3.scaleLinear()
        .domain([0, d3.max(dataWave)])
        .nice()
        .range([heightWave, 0]);

    const line = d3.line()
        .x((d, i) => xWave(dates[i]) + xWave.bandwidth() / 2)
        .y(d => yWave(d))
        .curve(d3.curveCardinal);

    const svgWave = d3.select("#chart2")
        .append("svg")
        .attr("width", widthWave + margin.left + margin.right)
        .attr("height", heightWave + margin.top + margin.bottom)
        .append("g")
        .attr("transform", `translate(${margin.left},${margin.top})`);

    svgWave.append("path")
        .datum(dataWave)
        .attr("class", "line")
        .attr("d", line)
        .attr("fill", "none")
        .attr("stroke", "#ffcc00")
        .attr("stroke-width", 2);

    // Thêm trục x
    svgWave.append("g")
        .attr("transform", `translate(0, ${heightWave})`)
        .call(d3.axisBottom(xWave));

    // Thêm trục y
    svgWave.append("g")
        .call(d3.axisLeft(yWave));

    // Thêm nhãn (label) cho từng điểm dữ liệu
    svgWave.selectAll(".dot")
        .data(dataWave)
        .enter().append("circle")
        .attr("class", "dot")
        .attr("cx", (d, i) => xWave(dates[i]) + xWave.bandwidth() / 2)
        .attr("cy", d => yWave(d))
        .attr("r", 3)
        .attr("fill", "#ffcc00");

    // Thêm nhãn số cho từng điểm dữ liệu
    svgWave.selectAll(".text")
        .data(dataWave)
        .enter().append("text")
        .attr("class", "text")
        .attr("x", (d, i) => xWave(dates[i]) + xWave.bandwidth() / 2)
        .attr("y", d => yWave(d) - 8)
        .attr("text-anchor", "middle")
        .text(d => d)
        .style("font-size", "10px")
        .style("fill", "#ffffff");

    // Thêm nhãn cho trục x
    svgWave.append("text")
        .attr("transform", `translate(${widthWave / 2},${heightWave + margin.top + 10})`)
        .style("text-anchor", "middle");

    // Thêm nhãn cho trục y
    svgWave.append("text")
        .attr("transform", "rotate(-90)")
        .attr("y", 0 - margin.left)
        .attr("x", 0 - (heightWave / 2))
        .attr("dy", "1em")
        .style("text-anchor", "middle");
</script>
</div>
@include('admin.layout.fotter')