</div>

<script>
    // Lấy thẻ canvas
    var ctx = document.getElementById('myChart').getContext('2d');

    // Dữ liệu cho biểu đồ
    var data = {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11',
            '12', '13', '14', '15', '16', '17', '18', '19', '20', '21',
            '22', '23', '24', '25', '26', '27', '27', '29', '30', '31'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [
                65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56,
                55, 40, 65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81,
                56, 55, 40, 21, 22, 44
            ],
            backgroundColor: [
                'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green',
                'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green',
                'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green'
            ],
        }]
    };

    // Cấu hình biểu đồ
    var config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // Tạo biểu đồ mới
    var myChart = new Chart(ctx, config);
</script>
</body>

</html>
<script src="js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>