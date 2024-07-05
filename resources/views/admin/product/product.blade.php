<style>
    .product_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>
@include('admin.layout.header')
<div class="m-4 pt-20">
    <div class="flex justify-between text-xs sm:text-sm">
        <div class="flex text-gray-600">
            <form action="{{ route('product') }}" method="GET" class="flex">
                <div class="ml-2 sm:ml-4 flex">
                    <label for="startDate" class="block text-gray-500 mt-1">Từ ngày</label>
                    <input class="p-1.5 sm:p-2 rounded-lg ml-2" type="date" id="startDate" name="start_date">
                </div>
                <div class="ml-2 sm:ml-4 flex">
                    <label for="endDate" class="block text-gray-500 mt-1">Đến ngày</label>
                    <input class="p-1.5 sm:p-2 rounded-lg ml-2" type="date" id="endDate" name="end_date">
                </div>
                <div class="ml-2 sm:ml-6">
                    <div class="relative rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-2">
                            <ion-icon class="text-gray-500 sm:text-sm" name="search-outline"></ion-icon>
                        </div>
                        <input type="text" name="keyword" id="keyword" class="block w-full rounded-md border-0 py-1.5 sm:py-2 pl-5 pr-16 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Tìm kiếm">
                    </div>
                </div>
                <div class="ml-2 sm:ml-6">
                    <button type="submit" class="bg-slate-800 text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-md">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
    <div class="flex my-6">
        <div class="px-4 border-b-2 py-1">
            <a href="{{ route('product') }}" class="flex {{ request('status') == null ? 'selected' : '' }}">
                <span {{ request('status') == null ? 'class=text-yellow-500' : '' }} class="">Tất cả</span>
                <div class="icon_count ml-1 bg-yellow-500">{{ $statusCounts[4] }}</div>
            </a>
        </div>
        <div class="px-4 border-b-2 py-1">
            <a href="{{ route('product', ['status' => '1']) }}" class="flex {{ request('status') == '1' ? 'selected' : '' }}">
                <span {{ request('status') == '1' ? 'class=text-yellow-500' : '' }}>Hoạt động</span>
                <div class="icon_count ml-1">{{ $statusCounts[1] }}</div>
            </a>
        </div>
        <div class="px-4 border-b-2 py-1">
            <a href="{{ route('product', ['status' => '2']) }}" class="flex {{ request('status') == '2' ? 'selected' : '' }}">
                <span {{ request('status') == '2' ? 'class=text-yellow-500' : '' }}>Nháp</span>
                <div class="icon_count ml-1">{{ $statusCounts[2] }}</div>
            </a>
        </div>
        <div class="px-4 border-b-2 py-1">
            <a href="{{ route('product', ['status' => '3']) }}" class="flex {{ request('status') == '3' ? 'selected' : '' }}">
                <span {{ request('status') == '3' ? 'class=text-yellow-500' : '' }}>Đã xóa</span>
                <div class="icon_count ml-1">{{ $statusCounts[3] }}</div>
            </a>
        </div>
    </div>
    <div class="flex flex-wrap justify-start items-center">
        <span class="text-sm sm:text-base mr-4">0 sản phẩm đã chọn</span>
        <button class="button_selected text-xs sm:text-sm"><ion-icon class="mr-2 mb-1 text-purple-700 " name="bag-check-outline"></ion-icon>Hết hàng</button>
        <button class="button_selected text-xs sm:text-sm"><ion-icon class="mr-2 mb-1 text-fuchsia-600 " name="cash-outline"></ion-icon>Giảm giá</button>
        <button class="button_selected text-xs sm:text-sm"><ion-icon class="mr-2 mb-1 text-blue-400 " name="apps-outline"></ion-icon>Chọn tất cả</button>
        <button class="button_selected text-xs sm:text-sm"><ion-icon class="mr-2 mb-1 text-blue-700 " name="file-tray-full-outline"></ion-icon>In mã QR</button>
        <button class="button_selected text-xs sm:text-sm"><ion-icon class="mr-2 mb-1 text-sky-500 " name="exit-outline"></ion-icon>Xuất file</button>
        <button class="button_selected text-xs sm:text-sm"><ion-icon class="mr-2 mb-1 text-red-500 " name="trash-outline"></ion-icon>Xóa</button>
    </div>
    <table class="table-auto w-full my-6 rounded-lg overflow-hidden">
        <thead>
            <tr class="text-left bg-gray-400">
                <th class="px-4 py-2"></th>
                <th class="px-2 py-2 hidden sm:table-cell">ID</th>
                <th class="px-4 py-2">Thông tin sản phẩm</th>
                <th class="px-4 py-2 hidden sm:table-cell">Màu sắc</th>
                <th class="px-4 py-2">Thương hiệu</th>
                <th class="px-4 py-2 hidden sm:table-cell">Danh mục</th>
                <th class="px-4 py-2">Đơn giá</th>
                <th class="px-4 py-2 hidden sm:table-cell">Số lượng</th>
                <th class="px-4 py-2">Trạng thái</th>
                <th class="px-4 py-2">...</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $index => $product)
            <tr class="{{ $index % 2 == 0 ? 'bg-gray-200' : 'bg-gray-100' }}">
                <td class="px-2 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2 hidden sm:table-cell">{{ $product->id }}</td>
                <td class="px-4 py-2 flex">
                    <img src="{{ asset($product->primary_image_url ?? 'placeholder.jpg') }}" width="50" alt="" class="hidden sm:table-cell">
                    <div class="pl-2">
                        <p class="product-name">{{ $product->product_name }}</p>
                        <span>{{ $product->product_code }}</span>
                    </div>
                </td>
                <td class="px-4 py-2 hidden sm:table-cell">{{ Illuminate\Support\Str::limit($product->color, 6) }}</td>
                <td class="px-4 py-2">{{ $product->brand->brand_name }}</td>
                <td class="px-4 py-2 hidden sm:table-cell">{{ $product->category->category_name }}</td>
                <td class="px-4 py-2">{{ number_format($product->price) }} VND</td>
                <td class="px-4 py-2 hidden sm:table-cell">{{ $product->quantity }}</td>
                <td class="px-4 py-2">
                    @php
                    $statusLabels = [
                    1 => 'Còn hàng',
                    2 => 'Hết hàng',
                    3 => 'Đã xóa'
                    ];
                    @endphp
                    {{ $statusLabels[$product->status] ?? 'Không xác định' }}
                </td>
                <td class="px-4 py-2">
                    <div x-data="{ isOpen: false }" x-init="() => { isOpen = false }" @click.away="isOpen = false">
                        <button @click="isOpen = !isOpen" class="text-gray-700 px-4 py-2 rounded-md focus:outline-none focus:bg-gray-300 hover:bg-gray-300 text-2xl">...</button>
                        <div x-show="isOpen" class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-10" @click="isOpen = false">
                            <a href="{{ route('edit_product', ['id' => $product->id]) }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Sửa</a>
                            <form action="{{ route('delete_product', ['id' => $product->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="block w-full text-left px-4 py-2 text-red-600 hover:bg-gray-200">Xóa</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex justify-end mr-8">
        <div>
            {{ $products->links() }}
        </div>
    </div>
</div>
</div>
@include('admin.layout.fotter')