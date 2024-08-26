
@include('public.header.index')

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Cấu hình PC của bạn</h1>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden" style="max-height: 400px; overflow-y: auto;">
            <table class="min-w-full">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="w-1/3 px-4 py-2 text-left">Tên sản phẩm</th>
                        <th class="w-1/4 px-4 py-2 text-left">Hình ảnh</th>
                        <th class="w-1/4 px-4 py-2 text-left">Số lượng</th>
                        <th class="w-1/4 px-4 py-2 text-left">Giá</th>
                    </tr>
                </thead>
                <table class="text-gray-700">
                    <tbody>
                        @foreach($configurationItems as $item)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="w-1/3 px-4 py-2">{{ $item->product->product_name }}</td>
                            <td class="w-1/4 px-4 py-2">
                                <img src="{{ $item->image_path }}" alt="{{ $item->product->product_name }}" class="w-24 h-24 object-cover rounded">
                            </td>
                            <td class="w-1/4 px-4 py-2">{{ $item->quantity }}</td>
                            <td class="w-1/4 px-4 py-2">{{ number_format($item->product->price, 0, ',', '.') }} đ</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </table>
        </div>

        <div class="flex justify-between items-center mt-6">
            <h2 class="text-2xl font-bold text-blue-600">Tổng giá: {{ number_format($totalPrice, 0, ',', '.') }} đ</h2>
        </div>
    </div>
    @include('public.footer.footer')
