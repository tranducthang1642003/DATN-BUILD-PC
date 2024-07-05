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
        <div class="w-full lg:w-8/12 table-responsive mb-5" style="max-height: 500px; overflow-y: auto;">

            <table class="w-full">
                <thead>
                    <tr>
                        <th class="py-2">Hình</th>
                        <th></th>
                        <th class="py-2">Số lượng</th>
                        <th class="py-2">Giá</th>
                        <th class="py-2">Tổng tiền</th>
                        <th class="py-2">Chỉnh sữa</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($cartItems as $item)
                    <tr class="border">
                        <td class="w-2/12">
                            <div class="p-3">
                                <img src="https://static.remove.bg/sample-gallery/graphics/bird-thumbnail.jpg" alt="" class="max-w">
                            </div>
                        </td>
                        <td class="w-3/12">

                            <span class="p-3">
                                <p class="text-lg font-semibold leading-tight">
                                    {{ Str::limit($item->product->product_name, 35, '...') }}
                                </p>
                            </span>
                                <span class="">
                                    <p class="text-xs">{{ $item->product->color }}</p>
                                </span>
                                <span class="">
                                    <p class="text-xs">Size: {{ $item->product->size }}</p>
                                </span>
                                <span class="">
                                    <p class="text-xs">Product Code: {{ $item->product->code }}</p>
                                </span>
                        </td>
                            
                        <td class="w-2/12 text-center">{{ $item->product->price }} VND</td>
                        <td class="w-2/12">
                            <div class="flex items-center justify-center">
                                <button class="px-2 py-1 bg-gray-200 text-gray-700 rounded-l" onclick="updateQuantity({{ $item->id }}, -1)">-</button>
                                <input type="number" class="w-12 px-2 py-1 text-center border border-gray-300" value="{{ $item->quantity }}" readonly>
                                <button class="px-2 py-1 bg-gray-200 text-gray-700 rounded-r" onclick="updateQuantity({{ $item->id }}, 1)">+</button>
                            </div>
                        </td>
                        <td class="w-2/12 text-center">
                            
                            <div class="">{{ $item->product->price * $item->quantity }} VND</div>
                        </td>
                        <td class="w-1/12 text-center">
                            <div class="">
                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-400 hover:bg-red-500 text-white font-bold py-1 px-3 rounded">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                            
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="w-full lg:w-3/12">
            <div class=" mx-auto border-2">
                <div class="flex justify-between items-center px-4 py-3 border-b">
                    <h1 class="text-lg font-bold">
                        <span class="text-yellow-500">Khuyễn mãi</span>
                    </h1>
                    <a href="#" class="text-yellow-500">Xem thêm ></a>
                </div>
                <form class="flex p-5">
                    <input type="text" placeholder="Nhập coupon"
                        class=" w-8/12 p-2 border border-gray-300 rounded-l focus:outline-none focus:ring focus:border-yellow-300">
                    <button type="submit" class=" w-4/12 bg-yellow-500 text-white p-1  hover:bg-yellow-600 ml-1">Apply
                        Coupon</button>
                </form>
            </div>
            <h5 class="text-lg font-bold mt-5 mb-5 p-1 border-b"><span class="text-yellow-500 pr-3 bold">Cart
                    Summary</span></h5>
            <div class="border p-4">
                <div class="flex justify-between p-2 border-b-2">
                    <span>Tổng giá tiền:</span>
                    <span> {{ $totalPrice }} VND</span>
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
                    <button
                        class="col-span-2 md:col-span-1 bg-yellow-400 text-white px-4 py-2 rounded w-70% hover:bg-yellow-500">Đặt
                        hàng</button>
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
@include('public.footer.footer')