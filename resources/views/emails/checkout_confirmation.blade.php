<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        h3 {
            color: #555;
            margin-bottom: 10px;
        }
        ul {
            padding: 0;
            list-style-type: none;
        }
        li {
            margin-bottom: 10px;
        }
        p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Xác nhận đơn hàng</h2>
        <p>Xin chào {{ $order->customer_name }},</p>
        <p>Cảm ơn bạn đã đặt hàng tại cửa hàng chúng tôi. Dưới đây là chi tiết đơn hàng của bạn:</p>
        
        <h3>Chi tiết đơn hàng</h3>
        <ul>
            @foreach ($order->items as $item)
                <li>{{ $item->product_name }} - {{ $item->quantity }} x {{ number_format($item->price, 0, ',', '.') }} VNĐ</li>
            @endforeach
        </ul>
        
        <p>Tổng tiền thanh toán: {{ number_format($order->total_amount, 0, ',', '.') }} VNĐ</p>
        
        <p>Xin cảm ơn và chúc bạn một ngày tốt lành!</p>
    </div>
</body>
</html>
