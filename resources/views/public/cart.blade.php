@include('public.header.index')
<style>
    .table-fixed {
        table-layout: fixed;
        width: 100%;
    }

    .whitespace-normal {
        word-wrap: break-word;
        word-break: break-all;
    }
</style>

<div class="container mx-auto py-20 p-10">
    <div class="px-5 border flex justify-between m-2 p-2">
        <h1>Giỏ hàng của bạn</h1>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <a href=""><span>Mua thêm sản phẩm khác</span></a>
    </div>

    @if (session('success_message'))
    <div id="success_message"
        class="fixed top-0 right-0 mt-4 mr-4 bg-green-500 text-white px-4 py-2 rounded shadow-md transition-transform transform duration-500 ease-out">
        {{ session('success_message') }}
    </div>
    @endif

    <div class="flex flex-wrap px-2 justify-between">
        <div class="w-full lg:w-8/12 mb-5">
            <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="py-2">Hình ảnh</th>
                            <th class="py-2">Tên sản phẩm</th>
                            <th class="py-2">Đơn giá</th>
                            <th class="py-2">Số lượng</th>
                            <th class="py-2">Tổng tiền</th>
                            <th class="py-2">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                        <tr class="border">
                            <td class="py-2 flex items-center justify-center w-40 p-5">
                                <img src="{{ $item->primary_image_path }}" alt="{{ $item->product->product_name }}">
                            </td>
                            <td class="py-2 whitespace-normal">
                                <p>{{ $item->product->product_name }}</p>
                            </td>
                            <td class="py-2">{{ number_format($item->product->price) }} VND</td>
                            <td class="py-2">
                                <div class="flex items-center justify-center">
                                    <button class="px-2 py-1 bg-gray-200 text-gray-700 rounded-l"
                                        onclick="updateQuantity({{ $item->id }}, -1)">-</button>
                                    <input type="number"
                                        class="w-12 px-2 py-1 text-center border border-gray-300"
                                        value="{{ $item->quantity }}" readonly>
                                    <button class="px-2 py-1 bg-gray-200 text-gray-700 rounded-r"
                                        onclick="updateQuantity({{ $item->id }}, 1)">+</button>
                                </div>
                            </td>
                            <td class="py-2">{{ number_format($item->product->price * $item->quantity) }} VND</td>
                            <td class="py-2">
                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-400 hover:bg-red-500 text-white font-bold py-1 px-3 rounded">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-full lg:w-3/12">
            <div class="mx-auto border-2 rounded-lg shadow-md">
                <div class="flex justify-between items-center px-4 py-3 border-b">
                    <h1 class="text-lg font-bold text-yellow-500">Khuyến mãi</h1>
                    <a href="#" class="text-yellow-500 hover:underline">Xem thêm <i
                            class="fa-solid fa-arrow-right"></i></a>
                </div>
                @if ($text_price_sale)
                <form action="{{ route('cart.unCoupon') }}" method="POST" class="mt-2">
                    @csrf
                    <div class="flex justify-between items-center p-4">
                        <p>Đã áp dụng mã giảm: {{ $name_discount }}</p>
                        <button type="submit" class="btn btn-danger rounded-md px-4 py-2 bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:bg-red-600">Xóa</button>
                    </div>
                </form>
                @else
                <form action="{{ route('cart.applyCoupon') }}" method="POST" class="px-4 py-3">
                    @csrf
                    <div class="flex items-center">
                        <input type="text" name="coupon_code" placeholder="Nhập mã giảm giá"
                            class="form-input border-2 border-gray-200 rounded-l-md p-2 w-full focus:outline-none focus:border-blue-500">
                        <button type="submit"
                            class="btn btn-primary rounded-r-md px-4 py-2 bg-blue-500 text-white ml-2 hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                            Áp dụng
                        </button>
                    </div>
                </form>
                @endif
            </div>
            <div class="border p-4 mt-5">
                <div class="flex justify-between p-2 border-b-2">
                    <span>Tổng giá tiền:</span>
                    <span>{{ number_format($totalPrices) }} VND</span>
                </div>
                <div class="flex justify-between p-2 border-b-2">
                    <span>Đã giảm:</span>
                    <span class="text-red-600 decoration-slice">
                        -{{ $text_price_sale ?? 0 }} VND
                    </span>
                </div>
                <div class="flex justify-between p-2 border-b-2">
                    <span>tổng:</span>
                    <span>{{ number_format($totalPrice) }} VND</span>

                </div>
                {{-- <div class="flex justify-between p-2 border-b-2">
                    <span>Total:</span>
                    <span>$55.00</span>
                </div> --}}
                <div class="grid grid-cols-1 gap-4 mt-5">
                    <form action="{{ route('orders.checkout') }}" method="GET" class="mt-8">
                        @csrf
                        <button type="submit"
                            class="bg-yellow-400 text-white px-4 py-2 rounded hover:bg-yellow-500 mt-4">Xác nhận
                            đặt hàng</button>
                    </form>

                   
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateQuantity(cartItemId, change) {
        let url = `/cart/updateQuantity/${cartItemId}`;
        fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    change: change
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating quantity.');
            });
    }
</script>

@include('public.footer.footer')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var element = document.getElementById('success_message');
        if (element) {
            // Di chuyển từ phải sang trái
            element.style.transform = 'translateX(0)';
            // Chờ 5 giây sau đó ẩn đi
            setTimeout(function() {
                element.style.transform = 'translateX(100%)';
                setTimeout(function() {
                    element.remove(); // Xóa phần tử thông báo
                }, 500); // Thời gian chờ ẩn đi
            }, 5000); // Thời gian chờ tồn tại
        }
    });
</script>