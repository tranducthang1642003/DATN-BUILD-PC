@include('admin.layout.header')
<div class="mx-8 pt-20 w-full">
    <div class="text-base flex items-center mb-8 text-slate-400">
        <a class="hover:text-slate-50" href="{{ route('admin') }}"><ion-icon name="home"></ion-icon></a>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <span>Manage</span>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <a class="hover:text-slate-50" href="{{ route('admin.buildpc') }}"><span>Build PC</span></a>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <span>Chi tiết cấu hình</span>
    </div>
    <div class="bg-white overflow-hidden">
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
</div>
@include('admin.layout.fotter')