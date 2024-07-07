{{-- @include('public.header.index')
<div class="container mx-auto">
  <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-4 sm:grid-cols-1">
    <div class="col-span-1">
      <div class="bg-white p-8 border shadow-md">
        <div class="border-b-2 p-2 mb-4 border-yellow-500">
          <h1 class="text-xl sm:text-3xl md:text-3xl  font-bold text-orange-600">Thông tin khách hàng</h1>
        </div>
        <div class="flex flex-wrap">
          <div class="w-full p-1">
            <label for="full-name" class="block text-lg sm:text-xl md:text-2xl font-medium text-gray-700">Họ và tên</label>
            <input id="full-name" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập họ và tên">
          </div>
          <div class="w-full sm:w-1/2 p-1">
            <label for="phone-number" class="block text-lg sm:text-xl md:text-2xl font-medium text-gray-700">Số điện thoại</label>
            <input id="phone-number" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập số điện thoại">
          </div>
          <div class="w-full sm:w-1/2 p-1">
            <label for="email" class="block text-lg sm:text-xl md:text-2xl font-medium text-gray-700">Email</label>
            <input id="email" type="email" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập email">
          </div>
          <div class="w-full p-1">
            <label for="address" class="block text-lg sm:text-xl md:text-2xl font-medium text-gray-700">Địa chỉ</label>
            <input id="address" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập địa chỉ">
          </div>
          <div class="w-full sm:w-1/2 p-1">
            <label for="city" class="block text-lg sm:text-xl md:text-2xl font-medium text-gray-700">Thành phố</label>
            <input id="city" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập thành phố">
          </div>
          <div class="w-full sm:w-1/2 p-1">
            <label for="district" class="block text-lg sm:text-xl md:text-2xl font-medium text-gray-700">Quận/Huyện</label>
            <input id="district" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập quận/huyện">
          </div>
          <div class="w-full p-1">
            <label for="note" class="block text-lg sm:text-xl md:text-2xl font-medium text-gray-700">Ghi chú</label>
            <textarea id="note" class="mt-1 p-2 border border-gray-300 rounded-md w-full" rows="3" placeholder="Nhập ghi chú"></textarea>
          </div>
        </div>
        <div class="mb-4 border-b-2 border-yellow-500 p-2 mt-4">
          <h1 class="text-xl sm:text-3xl md:text-3xl   font-bold text-orange-600">Phương thức thanh toán</h1>
        </div>
        <div>
          <label class="inline-flex items-center mb-2">
            <input type="radio" name="payment-method" value="cash" class="form-radio h-4 w-4 lg:h-5 lg:w-5 text-yellow-500">
            <span class="text-lg sm:text-xl md:text-2xl lg:text-3xl ml-2">Thanh toán bằng tiền mặt</span>
          </label>
        </div>
        <div>
          <label class="inline-flex items-center mb-2">
            <input type="radio" name="payment-method" value="momo" class="form-radio h-4 w-4 lg:h-5 lg:w-5 text-yellow-500">
            <span class="text-lg sm:text-xl md:text-2xl lg:text-3xl ml-2">Thanh toán bằng MoMo</span>
          </label>
        </div>
        <div>
          <label class="inline-flex items-center mb-2">
            <input type="radio" name="payment-method" value="vnpay" class="form-radio h-4 w-4 lg:h-5 lg:w-5 text-yellow-500">
            <span class="text-lg sm:text-xl md:text-2xl lg:text-3xl ml-2">Thanh toán bằng VNPay</span>
          </label>
        </div>
      </div>
    </div>
    <div class="col-span-1">
      <div class="bg-white p-8 border shadow-md">
        <div class="border-b-2 p-2 mb-4 border-yellow-500">
          <h1 class="text-xl sm:text-3xl md:text-3xl  font-bold text-orange-600">Thông tin đơn hàng</h1>
        </div>
        <div class="flex items-center mb-4 justify-between col-span-1 shadow p-1 border">
          <img src="https://img-cdn.pixlr.com/image-generator/history/65bb506dcb310754719cf81f/ede935de-1138-4f66-8ed7-44bd16efc709/medium.webp" alt="Product Image" class="w-20 h-20 mr-4">
          <div class="col-span-2">
            <dd class="mt-2 text-lg sm:text-xl md:text-1xl text-gray-500" style="word-wrap: break-word;">
              Màn Hình Cooler Master GA241 Màn Hình Cooler Master GA241 GA241 Màn Hình Cooler Master GA241
            </dd>
          </div>
          <div class="flex-shrink-0 col-span-1">
            <p class="text-gray-600 mr-4 text-right mb-4 ext-lg sm:text-xl md:text-1xl">
              X3
            </p>
            <p class="text-gray-600 ext-lg sm:text-xl md:text-1xl">
              150000000 Đ
            </p>
          </div>
        </div>
        <div class="border mt-5 p-2 bg-gray-300">
          <span class="text-xl sm:text-3xl md:text-3xl  font-bold text-orange-600">Tổng tiền</span>
        </div>
        <div class="border p-4">
          <div class="flex justify-between p-2 border-b-2 text-lg sm:text-xl md:text-2xl lg:text-2xl ml-2">
            <span>Subtotal:</span>
            <span>$50.00</span>
          </div>
          <div class="flex justify-between p-2 border-b-2 text-lg sm:text-xl md:text-1xl lg:text-2xl ml-2">
            <span>Total:</span>
            <span>$55.00</span>
          </div>
          <div class="grid grid-cols-1 gap-4 mt-5">
            <button class="col-span-2 md:col-span-1 bg-yellow-400 text-white px-4 py-2 rounded w-70% hover:bg-yellow-500 text-lg sm:text-xl md:text-2xl lg:text-2xl ml-2">Xác nhận thanh toán</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('public.footer.footer') --}}

{{-- <form action="{{ route('orders.store') }}" method="POST">
  @csrf
  <!-- Các trường nhập thông tin khách hàng -->
  <input type="text" name="full-name" placeholder="Nhập họ và tên" required>
  <input type="text" name="phone-number" placeholder="Nhập số điện thoại" required>
  <input type="email" name="email" placeholder="Nhập email" required>
  <input type="text" name="address" placeholder="Nhập địa chỉ" required>
  <input type="text" name="city" placeholder="Nhập thành phố" required>
  <input type="text" name="district" placeholder="Nhập quận/huyện" required>
  
  <!-- Lựa chọn phương thức thanh toán -->
  <label><input type="radio" name="payment-method" value="cash" required> Thanh toán bằng tiền mặt</label>
  <label><input type="radio" name="payment-method" value="momo" required> Thanh toán bằng MoMo</label>
  <label><input type="radio" name="payment-method" value="vnpay" required> Thanh toán bằng VNPay</label>

  <!-- Hiển thị thông tin giỏ hàng -->
  <div class="bg-white p-8 border shadow-md mt-4">
    <h1 class="text-xl font-bold text-orange-600 mb-4">Thông tin đơn hàng</h1>
    @foreach ($cartItems as $item)
      <div class="flex items-center justify-between border-b-2 py-2">
        <div class="flex items-center">
          <img src="{{ $item['product_image_url'] }}" alt="{{ $item['product_name'] }}" class="w-16 h-16 mr-4">
          <span>{{ $item['product_name'] }}</span>
        </div>
        <div>
          <span>{{ $item['quantity'] }} x {{ number_format($item['price'], 0, ',', '.') }} VNĐ</span>
        </div>
      </div>
    @endforeach

    <!-- Tổng tiền -->
    <div class="flex justify-between mt-4">
      <span class="font-bold">Tổng tiền:</span>
      <span>{{ number_format($total, 0, ',', '.') }} VNĐ</span>
    </div>
  </div>

  <!-- Nút xác nhận thanh toán -->
  <button type="submit" class="col-span-2 md:col-span-1 bg-yellow-400 text-white px-4 py-2 rounded w-70% hover:bg-yellow-500 mt-4">Xác nhận thanh toán</button>
</form> --}}




<!-- resources/views/orders/checkout.blade.php -->
<!-- resources/views/orders/checkout.blade.php -->


<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Xác nhận đặt hàng</h1>
    
    <div class="bg-white p-8 border shadow-md">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Thông tin đơn hàng</h2>
        
        @foreach ($cartItems as $item)
        <div class="flex items-center justify-between border-b py-2">
            <div class="flex items-center">
                <img src="{{ $item['product_image_url'] }}" alt="{{ $item['product_name'] }}" class="w-16 h-16 mr-4">
                <span>{{ $item['product_name'] }}</span>
            </div>
            <div>
                <span>{{ $item['quantity'] }} x {{ number_format($item['price'], 0, ',', '.') }} VNĐ</span>
            </div>
        </div>
        @endforeach
        
        <div class="flex justify-between mt-4">
            <span class="font-bold">Tổng tiền:</span>
            <span>{{ number_format($total, 0, ',', '.') }} VNĐ</span>
        </div>
    </div>

    <!-- Form xác nhận đặt hàng -->
    <form action="{{ route('orders.placeOrder') }}" method="POST" class="mt-8">
        @csrf
        <!-- Các trường thông tin khách hàng -->
        <input type="text" name="full-name" placeholder="Nhập họ và tên" required class="border border-gray-300 px-4 py-2 rounded w-full mb-4">
        <input type="text" name="phone-number" placeholder="Nhập số điện thoại" required class="border border-gray-300 px-4 py-2 rounded w-full mb-4">
        <input type="email" name="email" placeholder="Nhập email" required class="border border-gray-300 px-4 py-2 rounded w-full mb-4">
        <input type="text" name="address" placeholder="Nhập địa chỉ" required class="border border-gray-300 px-4 py-2 rounded w-full mb-4">
        <input type="text" name="city" placeholder="Nhập thành phố" required class="border border-gray-300 px-4 py-2 rounded w-full mb-4">
        <input type="text" name="district" placeholder="Nhập quận/huyện" required class="border border-gray-300 px-4 py-2 rounded w-full mb-4">
        
        <!-- Lựa chọn phương thức thanh toán -->
        <label class="block mb-4">
            <input type="radio" name="payment-method" value="cash" required> Thanh toán bằng tiền mặt
        </label>
        <label class="block mb-4">
            <input type="radio" name="payment-method" value="momo" required> Thanh toán bằng MoMo
        </label>
        <label class="block mb-4">
            <input type="radio" name="payment-method" value="vnpay" required> Thanh toán bằng VNPay
        </label>

        <!-- Nút xác nhận đặt hàng -->
        <button type="submit" class="bg-yellow-400 text-white px-4 py-2 rounded hover:bg-yellow-500 mt-4">Xác nhận đặt hàng</button>
    </form>
</div>
