
@include('public.header.index')

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-center">Cấu hình PC của bạn</h1>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/3 px-4 py-4 text-left">Tên sản phẩm</th>
                        <th class="w-1/4 px-4 py-4 text-left">Hình ảnh</th>
                        <th class="w-1/4 px-4 py-4 text-left">Số lượng</th>
                        <th class="w-1/4 px-4 py-4 text-left">Giá</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($configurationItems as $item)
                        <tr class="border-b">
                            <td class="w-1/3 px-4 py-4">{{ $item->product->product_name }}</td>
                            <td class="w-1/4 px-4 py-4">
                                <img src="{{ $item->image_path }}" alt="{{ $item->product->product_name }}" class="w-20 h-20 object-cover rounded">
                            </td>
                            <td class="w-1/4 px-4 py-4">{{ $item->quantity }}</td>
                            <td class="w-1/4 px-4 py-4">{{ number_format($item->product->price, 0, ',', '.') }} đ</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex justify-between items-center mt-6">
            <h2 class="text-2xl font-bold">Tổng giá: {{ number_format($totalPrice, 0, ',', '.') }} đ</h2>
        </div>
    </div>
    @include('public.footer.footer')
