<link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
<div class="container mx-auto">
    <div class="px-5 border flex justify-between m-2 p-2">
        <h1>Giỏ hàng của bạn</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href=""><span>
                < mua thêm sản phẩm khác</span></a>
    </div>
    <div class="flex flex-wrap px-2 justify-between">
        <div class="w-full lg:w-7/12 table-responsive mb-5">

            <table
                class="w-full bg-white border border-gray-200 divide-y divide-gray-200 text-center hover:border-spacing-2 table-fixed ">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-2">Hình</th>
                        <th class="py-2">Tên sản phẩm</th>
                        <th class="py-2">Giá</th>
                        <th class="py-2">Số lượng</th>
                        <th class="py-2">Tôngt tiền</th>
                        <th class="py-2">Xóa</th>
                    </tr>
                </thead>

                <tbody class="align-middle">
                    @foreach ($cartItems as $item)
                        <tr class="border">
                            <td class="py-2 flex items-center justify-center"><img src="{{ $item->primary_image_path }}"
                                    alt="{{ $item->product->product_name }}" class="w-20 h-20 p-2 text">
                            </td>
                            <td class="py-2 whitespace-normal">
                                <span>
                                    <p>{{ $item->product->product_name }}</p>
                                </span>

                            </td>
                            <td class="py-2">{{ number_format($item->product->price) }} VND</td>
                            <td class="py-2">
                                <div class="flex items-center justify-center">
                                    <button class="px-2 py-1 bg-gray-200 text-gray-700 rounded-l"
                                        onclick="updateQuantity({{ $item->id }}, -1)">-</button>
                                    <input type="number" class="w-12 px-2 py-1 text-center border border-gray-300"
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
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fa fa-times">X</i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="w-full lg:w-4/12">
            <div class=" mx-auto border-2">
                <div class="flex justify-between items-center px-4 py-3 border-b">
                    <h1 class="text-lg font-bold">
                        <span class="text-yellow-500">Khuyễn mãi</span>
                    </h1>
                    <a href="#" class="text-yellow-500">Xem thêm ></a>
                </div>
                <form action="{{ route('apply.coupon') }}" method="POST">
                    @csrf
                    <input type="text" name="coupon_code" placeholder="Nhập mã giảm giá">
                    <button type="submit">Áp dụng</button>
                </form>
            </div>
            <h5 class="text-lg font-bold mt-5 mb-5 p-1 border-b"><span class="text-yellow-500 pr-3 bold">Cart
                    Summary</span></h5>
            <div class="border p-4">
                <div class="flex justify-between p-2 border-b-2">
                    <span>Tổng giá tiền:</span>
                    <span> {{ number_format($totalPrice) }} VND</span>
                </div>
                <div class="flex justify-between p-2 border-b-2">
                    <span>Shipping:</span>
                    <span>$5.00</span>
                </div>
                <div class="flex justify-between p-2 border-b-2">
                    <span>Total:</span>
                    <span>$55.00</span>
                </div>
                <div class="grid grid-cols-1 gap-4 mt-5">
                  <a href="checkout">
                    <button
                    class="col-span-2 md:col-span-1 bg-yellow-400 text-white px-4 py-2 rounded w-70% hover:bg-yellow-500">Đặt
                    hàng</button>
                  </a>
                    <button
                        class="col-span-2 md:col-span-1 bg-blue-500 text-white px-4 py-2 rounded w-70% hover:bg-blue-600">Trả
                        góp</button>
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
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    }
</script>
