<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<div class="container mx-auto">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="col-span-1">
      <div class="bg-white p-8 border shadow-md">
        <div class="border-b-2 p-2 mb-4 border-yellow-500">
          <h1 class="text-2xl font-bold text-orange-600">Thông tin khách hàng</h1>
        </div>
        <div class="flex flex-wrap">
          <div class="w-full p-1">
            <label for="full-name" class="block text-sm font-medium text-gray-700">Họ và tên</label>
            <input id="full-name" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập họ và tên">
          </div>
          <div class="w-full sm:w-1/2 p-1">
            <label for="phone-number" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
            <input id="phone-number" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập số điện thoại">
          </div>
          <div class="w-full sm:w-1/2 p-1">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" type="email" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập email">
          </div>
          <div class="w-full p-1">
            <label for="address" class="block text-sm font-medium text-gray-700">Địa chỉ</label>
            <input id="address" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập địa chỉ">
          </div>
          <div class="w-full sm:w-1/2 p-1">
            <label for="city" class="block text-sm font-medium text-gray-700">Thành phố</label>
            <input id="city" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập thành phố">
          </div>
          <div class="w-full sm:w-1/2 p-1">
            <label for="district" class="block text-sm font-medium text-gray-700">Quận/Huyện</label>
            <input id="district" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập quận/huyện">
          </div>
          <div class="w-full p-1">
            <label for="note" class="block text-sm font-medium text-gray-700">Ghi chú</label>
            <textarea id="note" class="mt-1 p-2 border border-gray-300 rounded-md w-full" rows="3" placeholder="Nhập ghi chú"></textarea>
          </div>
        </div>
        <div class="mb-4 border-b-2 border-yellow-500 p-2 mt-4">
          <h1 class="text-2xl font-bold text-orange-600">Phương thức thanh toán</h1>
        </div>
        <div>
          <label class="inline-flex items-center mb-2">
            <input type="radio" name="payment-method" value="cash" class="form-radio h-4 w-4 text-yellow-500">
            <span class="ml-2">Thanh toán bằng tiền mặt</span>
          </label>
        </div>
        <div>
          <label class="inline-flex items-center mb-2">
            <input type="radio" name="payment-method" value="momo" class="form-radio h-4 w-4 text-yellow-500">
            <span class="ml-2">Thanh toán bằng MoMo</span>
          </label>
        </div>
        <div>
<label class="inline-flex items-center mb-2">
            <input type="radio" name="payment-method" value="vnpay" class="form-radio h-4 w-4 text-yellow-500">
            <span class="ml-2">Thanh toán bằng VNPay</span>
          </label>
        </div>
      </div>
    </div>
    <div class="col-span-1">
      <div class="bg-white p-8 border shadow-md">
        <div class="border-b-2 p-2 mb-4 border-yellow-500">
          <h1 class="text-2xl font-bold text-orange-600">Thông tin đơn hàng</h1>
        </div>
        <div class="flex items-center mb-4 justify-between col-span-1 shadow p-1 border">
            <img src="https://img-cdn.pixlr.com/image-generator/history/65bb506dcb310754719cf81f/ede935de-1138-4f66-8ed7-44bd16efc709/medium.webp" alt="Product Image" class="w-16 h-16 mr-4">
            <div class="col-span-2">
              <dd class="mt-2 text-xs md:text-sm lg:text-xs xl:text-sm text-gray-500" style="word-wrap: break-word;">
                Màn Hình Cooler Master GA241 Màn Hình Cooler Master GA241 GA241 Màn Hình Cooler Master GA241
              </dd>
            </div>
            <div class="flex-shrink-0 col-span-1">
              <p class="text-gray-600 mr-4 text-right mb-4 text-xs md:text-sm lg:text-xs xl:text-sm">
                X3
              </p>
              <p class="text-gray-600 text-xs md:text-sm lg:text-xs xl:text-sm">
                150000000 Đ
              </p>
            </div>
          </div>
      <div class="border mt-5 p-2 bg-gray-300">
        <span class="text-2xl font-bold text-orange-600">Tổng tiền</span>
      </div>
      <div class="border p-4">
        <div class="flex justify-between p-2 border-b-2">
          <span>Subtotal:</span>
          <span>$50.00</span>
        </div>
        <div class="flex justify-between p-2 border-b-2">
          <span>Total:</span>
          <span>$55.00</span>
        </div>
        <div class="grid grid-cols-1 gap-4 mt-5">
          <button class="col-span-2 md:col-span-1 bg-yellow-400 text-white px-4 py-2 rounded w-70% hover:bg-yellow-500">Xác nhận thanh toán</button>
        </div>
      </div>
    </div>
  </div>
</div>