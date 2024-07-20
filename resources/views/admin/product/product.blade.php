<style>
    .product_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>
@include('admin.layout.header')
<div class="m-4 pt-20">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
    @endif
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
                <span {{ request('status') == '1' ? 'class=text-yellow-500' : '' }}>Còn hàng</span>
                <div class="icon_count ml-1">{{ $statusCounts[1] }}</div>
            </a>
        </div>
        <div class="px-4 border-b-2 py-1">
            <a href="{{ route('product', ['status' => '2']) }}" class="flex {{ request('status') == '2' ? 'selected' : '' }}">
                <span {{ request('status') == '2' ? 'class=text-yellow-500' : '' }}>Hết hàng</span>
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
                <td class="px-2 pt-2"><input type="checkbox"></td>
                <td class="px-4 pt-2 hidden sm:table-cell">{{ $product->id }}</td>
                <td class="px-4 pt-2 flex">
                    <img src="{{ asset($product->primary_image_url ?? 'placeholder.jpg') }}" width="50" alt="" class="hidden sm:table-cell">
                    <div class="pl-2">
                        <p class="product-name">{{ $product->product_name }}</p>
                        <span>{{ $product->product_code }}</span>
                    </div>
                </td>
                <td class="px-4 pt-2 hidden sm:table-cell">{{ Illuminate\Support\Str::limit($product->color, 6) }}</td>
                <td class="px-4 pt-2">{{ $product->brand->brand_name }}</td>
                <td class="px-4 pt-2 hidden sm:table-cell">{{ $product->category->category_name }}</td>
                <td class="px-4 pt-2">{{ number_format($product->price) }} VND</td>
                <td class="px-4 pt-2 hidden sm:table-cell">{{ $product->quantity }}</td>
                <td class="px-4 pb-4 status-cell flex items-center">
                    <span class="status-indicator
                        @if ($product->status == '1')
                            stocking
                        @elseif ($product->status == '2')
                            outOfStock
                        @else
                            deleted
                        @endif" title="{{ ucfirst($product->status) }}">
                    </span>
                    <div class="">
                        <select class="status-select bg-white border border-gray-300 rounded-md p-1 outline-none pr-8" data-order-id="{{ $product->id }}">
                            <option value="1" {{ $product->status == '1' ? 'selected' : '' }}>Còn hàng</option>
                            <option value="2" {{ $product->status == '2' ? 'selected' : '' }}>Hết hàng</option>
                            <option value="3" {{ $product->status == '3' ? 'selected' : '' }}>Đã xóa</option>
                        </select>
                    </div>
                </td>
                <td class="px-4 pt-2">
                    <div x-data="{ isOpen: false }" x-init="() => { isOpen = false }" @click.away="isOpen = false" class="detail-btn">
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
                    <form class="hidden update-form mt-5" method="POST" action="{{ route('update_product_status', ['product' => $product->id]) }}">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="number" name="status_new" class="bg-white border border-gray-300 rounded-md p-1 outline-none hidden" value="">
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md update-btn">Cập nhật</button>
                    </form>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusSelects = document.querySelectorAll('.status-select');
        statusSelects.forEach(select => {
            select.addEventListener('change', function() {
                const productId = this.dataset.productId;
                const newStatus = this.value;

                const parentRow = this.closest('tr');
                const detailBtn = parentRow.querySelector('.detail-btn');
                const updateForm = parentRow.querySelector('.update-form');

                const statusInput = updateForm.querySelector('input[name="status_new"]');
                statusInput.value = newStatus;

                detailBtn.classList.add('hidden');
                updateForm.classList.remove('hidden');

                const statusCell = parentRow.querySelector('.status-cell');
                const statusIndicator = statusCell.querySelector('.status-indicator');

                // Update status indicator class and title
                statusIndicator.className = `status-indicator ${
                    newStatus == '1' ? 'stocking' :
                    newStatus == '2' ? 'outOfStock' :
                    'deleted'
                }`;
                statusIndicator.title = ucfirst(newStatus == '1' ? 'Còn hàng' : (newStatus == '2' ? 'Hết hàng' : 'Đã xóa'));
            });
        });

        function ucfirst(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }
    });
</script>

@include('admin.layout.fotter')