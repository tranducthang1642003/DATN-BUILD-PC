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
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        li img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
            margin-right: 10px;
        }
        p {
            margin-bottom: 10px;
        }
        .order-details {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .total-amount {
            font-size: 18px;
            font-weight: bold;
            color: #e74c3c;
            text-align: right;
        }
        .highlight {
            color: #e67e22;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Xác nhận đơn hàng</h2>
        <p>Xin chào <span class="highlight">{{ $order->full_name }}</span>,</p>
        <p>Cảm ơn bạn đã đặt hàng tại cửa hàng chúng tôi. Dưới đây là chi tiết đơn hàng của bạn:</p>
        
        <div class="order-details">
            <h3>Chi tiết đơn hàng</h3>
            <p><strong>Mã đơn hàng:</strong> <span class="highlight">{{ $order->order_code }}</span></p>
            <ul>
                @foreach ($order->items as $item)
                    <li>
                        <img src="{{ asset('storage/' . $item->primary_image_path) }}" alt="{{ $item->product->product_name }}">
                        <div>
                            <p>{{ $item->product->product_name }}</p>
                            <p>{{ $item->quantity }} x {{ number_format($item->price, 0, ',', '.') }} VNĐ</p>
                        </div>
                    </li>
                @endforeach
            </ul>
            <p class="total-amount">Tổng tiền thanh toán: {{ number_format($order->total_amount, 0, ',', '.') }} VNĐ</p>
        </div>
        
        <p>Xin cảm ơn và chúc bạn một ngày tốt lành!</p>
    </div>
</body>
</html>
