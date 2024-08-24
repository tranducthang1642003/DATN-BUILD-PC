@include('public.header.index')

<div class="container mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-11/12 m-auto pt-10 py-10 ">
        <div>
            <div class="bg-white p-8 border shadow-md">
                <div class="border-b-2 p-2 mb-4 border-yellow-500">
                    <h1 class="text-3xl font-bold text-orange-600">Thông tin khách hàng</h1>
                </div>
                <form id="order-form" action="{{ route('orders.placeOrder') }}" method="POST" class="mt-8">
                @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="p-1">
                            <label for="full-name" class="block text-lg font-medium text-gray-700">Họ và tên</label>
                            <input id="full-name" name="full_name" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập họ và tên" required>
                        </div>
                        <div class="p-1">
                            <label for="phone-number" class="block text-lg font-medium text-gray-700">Số điện thoại</label>
                            <input id="phone-number" name="phone-number" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập số điện thoại" required>
                        </div>
                        <div class="p-1">
                            <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                            <input id="email" name="email" type="email" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập email" required>
                        </div>
                        <div class="p-1">
                            <label for="address" class="block text-lg font-medium text-gray-700">Địa chỉ</label>
                            <input id="address" name="address" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập địa chỉ" required>
                        </div>
                        <div class="p-1">
                            <label for="city" class="block text-lg font-medium text-gray-700">Thành phố</label>
                            <input id="city" name="city" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập thành phố" required>
                        </div>
                        <div class="p-1">
                            <label for="district" class="block text-lg font-medium text-gray-700">Quận/Huyện</label>
                            <input id="district" name="district" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập quận/huyện" required>
                        </div>
                        <div class="p-1">
                            <label for="note" class="block text-lg font-medium text-gray-700">Ghi chú</label>
                            <textarea id="note" name="note" class="mt-1 p-2 border border-gray-300 rounded-md w-full" rows="3" placeholder="Nhập ghi chú"></textarea>
                        </div>
                    </div>
                    <div class="mt-4 border-b-2 border-yellow-500 p-2">
                        <h1 class="text-3xl font-bold text-orange-600">Phương thức thanh toán</h1>
                    </div>
                    <div class="mt-4">
                        <label class="inline-flex items-center mb-2">
                            <input type="radio" name="payment-method" value="cash" class="form-radio h-4 w-4 lg:h-5 lg:w-5 text-yellow-500" required>
                            <span class="ml-2 text-lg font-medium text-gray-700">Thanh toán bằng tiền mặt</span>
                        </label>
                        <label class="inline-flex items-center mb-2">
                            <input type="radio" id="payment_url" name="payment-method" value="momo" class="form-radio h-4 w-4 lg:h-5 lg:w-5 text-yellow-500" required>
                            <input type="hidden" name="total" value="{{$total}}">
                            <span class="ml-2 text-lg font-medium text-gray-700">Thanh toán bằng MoMo</span>
                        </label>
                        <label class="inline-flex items-center mb-2">
                            
                            <input type="radio" id="payment_url" name="payment-method" value="pay" class="form-radio h-4 w-4 lg:h-5 lg:w-5 text-yellow-500" required>
                            <span class="ml-2 text-lg font-medium text-gray-700">Thanh toán bằng VNPay</span>
                        </label>
                    </div>
                    <div class="mt-8">
                        <button type="submit" class="bg-yellow-400 text-white px-4 py-2 rounded hover:bg-yellow-500">Xác nhận đặt hàng</button>
                    </div>
                    
                </form>
            </div>
        </div>
        <div>
            <div class="bg-white p-8 border shadow-md">
                <div class="border-b-2 p-2 mb-4 border-yellow-500">
                    <h1 class="text-3xl font-bold text-orange-600">Thông tin đơn hàng</h1>
                </div>
                @foreach ($cartItems as $item)
                <div class="flex items-center mb-4 justify-between">
                    <img src="{{ $item->primary_image_path }}" alt="{{ $item->product->product_name }}" class="w-20 h-20 object-cover rounded-lg">
                    <div>
                        <p class="text-lg font-medium text-gray-700">{{ $item->product->product_name }}</p>
                        <p class="text-lg font-medium text-gray-700">{{ number_format($item->price) }} VNĐ</p>
                    </div>
                    <p class="text-lg font-medium text-gray-700">{{ $item->quantity }} x</p>
                    <p class="text-lg font-medium text-gray-700">{{ number_format($item->price * $item->quantity) }} VNĐ</p>
                </div>
                @endforeach

                
                <div class="border-t mt-4 pt-4">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-bold text-orange-600">Tổng tiền</h2>
                        <span class="text-xl font-bold">{{ number_format($total) }} VNĐ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('public.footer.footer')



<script>
document.querySelector('#order-form').addEventListener('submit', function(event) {
    var paymentMethod = document.querySelector('input[name="payment-method"]:checked').value;
    var form = event.target;
    
    if (paymentMethod === 'momo') {
        event.preventDefault(); 
        
       
        console.log("Form Data:", new FormData(form));
        
        var paymentUrl = "{{ route('momo') }}"; 
        form.action = paymentUrl;
        form.submit();
    }
});


</script>
