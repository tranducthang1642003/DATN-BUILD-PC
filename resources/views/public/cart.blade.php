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
        <span>Giỏ hàng của bạn</span>
        <a href=""><span>< mua thêm sản phẩm khác</span></a>
      </div>
    <div class="flex flex-wrap px-2 justify-between">
        <div class="w-full lg:w-7/12 table-responsive mb-5">
            
            <table class="table-auto w-full bg-white border border-gray-200 divide-y divide-gray-200 text-center hover:border-spacing-2 table-fixed ">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-2">image</th>
                        <th class="py-2">Products</th>
                        <th class="py-2">Price</th>
                        <th class="py-2">Quantity</th>
                        <th class="py-2">Total</th>
                        <th class="py-2">Remove</th>
                    </tr>
                </thead>
            
                
                <tbody class="align-middle">
                  <tr class="border">
                    <td class="py-2 flex items-center justify-center"><img src="https://img-cdn.pixlr.com/image-generator/history/65bb506dcb310754719cf81f/ede935de-1138-4f66-8ed7-44bd16efc709/medium.webp" alt="" class="w-20 h-20 p-2 tex"></td>
                    <td class="py-2 whitespace-normal">
                      <span>Màn Hình Cooler Master GA241 (24 Inch/ Full HD/ 1ms/ 100HZ/ 250cd/M2/ VA)</span>
                    </td>
                    <td class="py-2">15000000</td>
                    <td class="py-2">
                      <div class="flex items-center justify-center">
                        <button id="decrease-btn" class="px-2 py-1 bg-gray-200 text-gray-700 rounded-l">-</button>
                        <input id="quantity-input" type="text" class="w-12 px-2 py-1 text-center border border-gray-300" value="1">
                        <button id="increase-btn" class="px-2 py-1 bg-gray-200 text-gray-700 rounded-r">+</button>
                      </div>
                    </td>
                    <td class="py-2">1500000000</td>
                    <td class="py-2">
                      <button class="btn btn-danger btn-sm">
                        <i class="fa fa-times">X</i>
                      </button>
                    </td>
                  </tr>
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
                <form class="flex p-5">
                  <input type="text" placeholder="Nhập coupon" class=" w-8/12 p-2 border border-gray-300 rounded-l focus:outline-none focus:ring focus:border-yellow-300">
                  <button type="submit" class=" w-4/12 bg-yellow-500 text-white p-1  hover:bg-yellow-600 ml-1">Apply Coupon</button>
                </form>
              </div>
            <h5 class="text-lg font-bold mt-5 mb-5 p-1 border-b"><span class="text-yellow-500 pr-3 bold">Cart Summary</span></h5>
            <div class="border p-4">
                <div class="flex justify-between p-2 border-b-2">
                  <span>Subtotal:</span>
                  <span>$50.00</span>
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
                    <button class="col-span-2 md:col-span-1 bg-yellow-400 text-white px-4 py-2 rounded w-70% hover:bg-yellow-500">Đặt hàng</button>
                    <button class="col-span-2 md:col-span-1 bg-blue-500 text-white px-4 py-2 rounded w-70% hover:bg-blue-600">Trả góp</button>
                  </div>
              </div>
        </div>
    </div>
</div>
<script>
    // Lấy các phần tử HTML
const decreaseBtn = document.getElementById('decrease-btn');
const increaseBtn = document.getElementById('increase-btn');
const quantityInput = document.getElementById('quantity-input');

// Đặt sự kiện click cho nút giảm
decreaseBtn.addEventListener('click', () => {
  let quantity = parseInt(quantityInput.value);
  if (quantity > 1) {
    quantity--;
    quantityInput.value = quantity;
  }
});

// Đặt sự kiện click cho nút tăng
increaseBtn.addEventListener('click', () => {
  let quantity = parseInt(quantityInput.value);
  quantity++;
  quantityInput.value = quantity;
});
</script>