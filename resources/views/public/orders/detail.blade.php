@include('public.header.index')

<div class="container mx-auto">
    <div class="bg-white p-8 border shadow-md w-11/12 m-auto mt-10">
        <div class="border-b-2 p-2 mb-4 border-yellow-500">
            <h1 class="text-3xl font-bold text-orange-600">Chi tiết đơn hàng</h1>
        </div>
        <div class="mb-4">
            <h2 class="text-2xl font-bold">Mã đơn hàng: {{ $order->order_code }}</h2>
            <p><strong>Họ và tên:</strong> {{ $order->full_name }}</p>
            <p><strong>Số điện thoại:</strong> {{ $order->phone_number }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Địa chỉ:</strong> {{ $order->shipping_address }}</p>
            <p><strong>Thành phố:</strong> {{ $order->city }}</p>
            <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
            <p><strong>Tổng tiền:</strong> {{ number_format($order->total_amount) }} VNĐ</p>
            <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
        </div>

        <div class="mt-4">
            <h3 class="text-xl font-bold mb-2">Sản phẩm trong đơn hàng</h3>
            @foreach ($order->items as $item)
            <div class="flex items-center mb-4">
                <img src="{{ $item->primary_image_path }}" alt="{{ $item->product->product_name }}" class="w-20 h-20 object-cover rounded-lg">
                <div class="ml-10 flex justify-between w-full">
                    <div>
                        <p class="text-lg font-medium text-gray-700">{{ $item->product->product_name }}</p>
                        <p class="text-lg font-medium text-gray-700">{{ number_format($item->price) }} VNĐ</p>
                    </div>
                    <div class=" flex">
                        <p class="text-lg font-medium text-gray-700">{{ $item->quantity }} x </p>
                        <p class="text-lg font-medium text-gray-700">{{ number_format($item->price * $item->quantity) }} VNĐ</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<br>
@include('public.footer.footer')