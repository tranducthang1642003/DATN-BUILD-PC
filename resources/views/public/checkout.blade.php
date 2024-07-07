@include('public.header.index')

<div class="container mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-4 sm:grid-cols-1">
        <div class="col-span-1">
            <div class="bg-white p-8 border shadow-md">
                <div class="border-b-2 p-2 mb-4 border-yellow-500">
                    <h1 class="text-xl sm:text-3xl md:text-3xl  font-bold text-orange-600">Thông tin khách hàng</h1>
                </div>
                <form action="{{ route('orders.placeOrder') }}" method="POST" class="mt-8">
                    @csrf
                    <div class="flex flex-wrap">
                        <div class="w-full p-1">
                            <label for="full-name" class="block text-lg sm:text-xl md:text-2xl font-medium text-gray-700">Họ và tên</label>
                            <input id="full-name" name="full-name" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập họ và tên" required>
                        </div>
                        <div class="w-full sm:w-1/2 p-1">
                            <label for="phone-number" class="block text-lg sm:text-xl md:text-2xl font-medium text-gray-700">Số điện thoại</label>
                            <input id="phone-number" name="phone-number" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập số điện thoại" required>
                        </div>
                        <div class="w-full sm:w-1/2 p-1">
                            <label for="email" class="block text-lg sm:text-xl md:text-2xl font-medium text-gray-700">Email</label>
                            <input id="email" name="email" type="email" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập email" required>
                        </div>
                        <div class="w-full p-1">
                            <label for="address" class="block text-lg sm:text-xl md:text-2xl font-medium text-gray-700">Địa chỉ</label>
                            <input id="address" name="address" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập địa chỉ" required>
                        </div>
                        <div class="w-full sm:w-1/2 p-1">
                            <label for="city" class="block text-lg sm:text-xl md:text-2xl font-medium text-gray-700">Thành phố</label>
                            <input id="city" name="city" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập thành phố" required>
                        </div>
                        <div class="w-full sm:w-1/2 p-1">
                            <label for="district" class="block text-lg sm:text-xl md:text-2xl font-medium text-gray-700">Quận/Huyện</label>
                            <input id="district" name="district" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập quận/huyện" required>
                        </div>
                        <div class="w-full p-1">
                            <label for="note" class="block text-lg sm:text-xl md:text-2xl font-medium text-gray-700">Ghi chú</label>
                            <textarea id="note" name="note" class="mt-1 p-2 border border-gray-300 rounded-md w-full" rows="3" placeholder="Nhập ghi chú"></textarea>
                        </div>
                    </div>
                    <div class="mb-4 border-b-2 border-yellow-500 p-2 mt-4">
                        <h1 class="text-xl sm:text-3xl md:text-3xl font-bold text-orange-600">Phương thức thanh toán</h1>
                    </div>
                    <div>
                        <label class="inline-flex items-center mb-2">
                            <input type="radio" name="payment-method" value="cash" class="form-radio h-4 w-4 lg:h-5 lg:w-5 text-yellow-500" required>
                            <span class="text-lg sm:text-xl md:text-2xl lg:text-3xl ml-2">Thanh toán bằng tiền mặt</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center mb-2">
                            <input type="radio" name="payment-method" value="momo" class="form-radio h-4 w-4 lg:h-5 lg:w-5 text-yellow-500" required>
                            <span class="text-lg sm:text-xl md:text-2xl lg:text-3xl ml-2">Thanh toán bằng MoMo</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center mb-2">
                            <input type="radio" name="payment-method" value="vnpay" class="form-radio h-4 w-4 lg:h-5 lg:w-5 text-yellow-500" required>
                            <span class="text-lg sm:text-xl md:text-2xl lg:text-3xl ml-2">Thanh toán bằng VNPay</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-1">
            <div class="bg-white p-8 border shadow-md">
                <div class="border-b-2 p-2 mb-4 border-yellow-500">
                    <h1 class="text-xl sm:text-3xl md:text-3xl  font-bold text-orange-600">Thông tin đơn hàng</h1>
                </div>
                @foreach ($cartItems as $item)
                <div class="flex items-center mb-4 justify-between col-span-1 shadow p-1 border">
                    <img src="{{ $item->primary_image_path }}" alt="{{ $item->product->product_name }}" class="w-20 h-20 p-2 text">
                    <div class="col-span-2">
                        <dd class="mt-2 text-lg sm:text-xl md:text-1xl text-gray-500" style="word-wrap: break-word;">
                            {{ $item->product->product_name }}
                        </dd>
                    </div>
                    <div class="flex-shrink-0 col-span-1">
                        <p class="text-gray-600 mr-4 text-right mb-4 ext-lg sm:text-xl md:text-1xl">
                            {{ $item['quantity'] }} x {{ number_format($item['price'], 0, ',', '.') }}
                        </p>
                        <p class="text-gray-600 ext-lg sm:text-xl md:text-1xl">
                            {{ number_format($item->product->price) }} VND
                        </p>
                    </div>
                </div>
                @endforeach

                <div class="border mt-5 p-2 bg-gray-300">
                    <span class="text-xl sm:text-3xl md:text-3xl  font-bold text-orange-600">Tổng tiền</span>
                </div>
                <div class="border p-4">
                    <div class="flex justify-between p-2 border-b-2 text-lg sm:text-xl md:text-2xl lg:text-2xl ml-2">
                        {{-- <span>Subtotal:</span>
                        <span>{{ number_format($total, 0, ',', '.') }} VNĐ</span> --}}
                    </div>
                    <div class="flex justify-between p-2 border-b-2 text-lg sm:text-xl md:text-1xl lg:text-2xl ml-2">
                        <span>Total:</span>
                        <span>{{ number_format($total, 0, ',', '.') }} VNĐ</span>
                    </div>
                    <div class="grid grid-cols-1 gap-4 mt-5">
                        <button type="submit" class="bg-yellow-400 text-white px-4 py-2 rounded hover:bg-yellow-500 mt-4">Xác nhận đặt hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('public.footer.footer')
