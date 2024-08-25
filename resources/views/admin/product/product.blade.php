<style>
    .product_active {
        background-color: rgb(219, 183, 94);
        color: white;
    }
</style>
@include('admin.layout.header')
<div class="mx-8 pt-20 w-full">
    <div class="text-base flex items-center mb-8 text-slate-400">
        <a class="hover:text-slate-50" href="{{ route('admin') }}"><ion-icon name="home"></ion-icon></a>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <span>Manage</span>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <a class="hover:text-slate-50" href="{{ route('product') }}"><span>Sản phẩm</span></a>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <span>Danh sách</span>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>s
    @endif
    <div class="flex justify-between text-xs sm:text-sm">
        <div class="flex text-white">
            <form action="{{ route('product') }}" method="GET" class="flex">
                <div class="ml-2 sm:ml-4 flex">
                    <label for="startDate" class="block text-gray-500 mt-1">Từ ngày</label>
                    <input class="p-1.5 sm:p-2 rounded-lg ml-2 bg-main text-gray-500 text-sm" type="date" id="startDate" name="start_date">
                </div>
                <div class="ml-2 sm:ml-4 flex">
                    <label for="endDate" class="block text-gray-500 mt-1">Đến ngày</label>
                    <input class="p-1.5 sm:p-2 rounded-lg ml-2 bg-main text-gray-500 text-sm" type="date" id="endDate" name="end_date">
                </div>
                <div class="ml-2 sm:ml-6">
                    <div class="relative rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-2">
                            <ion-icon class="text-white sm:text-sm" name="search-outline"></ion-icon>
                        </div>
                        <input type="text" name="keyword" id="keyword" class="block w-full bg-main rounded-md border-0 py-1.5 sm:py-2 pl-5 pr-16 text-white ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Tìm kiếm">
                    </div>
                </div>
                <div class="ml-2 sm:ml-6">
                    <button type="submit" class="bg-blue-400 hover:bg-blue-500 text-slate-700 px-3 sm:px-4 py-1.5 sm:py-2 rounded-md">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
    <div class="flex my-6">
        <div class=" py-1">
            <a href="{{ route('product') }}" class="px-4 flex hover:border-b-2 {{ request('status') == null ? 'selected' : '' }}">
                <span {{ request('status') == null ? 'class=text-yellow-500' : '' }} class="">Tất cả</span>
                <div class="icon_count ml-1 bg-yellow-500">{{ $statusCounts[4] }}</div>
            </a>
        </div>
        <div class="py-1">
            <a href="{{ route('product', ['status' => '1']) }}" class="px-4 flex hover:border-b-2 {{ request('status') == '1' ? 'selected' : '' }}">
                <span {{ request('status') == '1' ? 'class=text-yellow-500' : '' }}>Còn hàng</span>
                <div class="icon_count ml-1">{{ $statusCounts[1] }}</div>
            </a>
        </div>
        <div class="py-1">
            <a href="{{ route('product', ['status' => '2']) }}" class="px-4 flex hover:border-b-2 {{ request('status') == '2' ? 'selected' : '' }}">
                <span {{ request('status') == '2' ? 'class=text-yellow-500' : '' }}>Hết hàng</span>
                <div class="icon_count ml-1">{{ $statusCounts[2] }}</div>
            </a>
        </div>
        <div class=" py-1">
            <a href="{{ route('product', ['status' => '3']) }}" class="px-4 flex hover:border-b-2 {{ request('status') == '3' ? 'selected' : '' }}">
                <span {{ request('status') == '3' ? 'class=text-yellow-500' : '' }}>Đã xóa</span>
                <div class="icon_count ml-1">{{ $statusCounts[3] }}</div>
            </a>
        </div>
    </div>
    <!-- <div class="flex flex-wrap justify-start items-center">
        <span class="text-sm sm:text-base mr-4">0 sản phẩm đã chọn</span>
        <button class="button_selected text-xs sm:text-sm"><ion-icon class="mr-2 mb-1 text-purple-700 " name="bag-check-outline"></ion-icon>Hết hàng</button>
        <button class="button_selected text-xs sm:text-sm"><ion-icon class="mr-2 mb-1 text-fuchsia-600 " name="cash-outline"></ion-icon>Giảm giá</button>
        <button class="button_selected text-xs sm:text-sm"><ion-icon class="mr-2 mb-1 text-blue-400 " name="apps-outline"></ion-icon>Chọn tất cả</button>
        <button class="button_selected text-xs sm:text-sm"><ion-icon class="mr-2 mb-1 text-blue-700 " name="file-tray-full-outline"></ion-icon>In mã QR</button>
        <button class="button_selected text-xs sm:text-sm"><ion-icon class="mr-2 mb-1 text-sky-500 " name="exit-outline"></ion-icon>Xuất file</button>
        <button class="button_selected text-xs sm:text-sm"><ion-icon class="mr-2 mb-1 text-red-500 " name="trash-outline"></ion-icon>Xóa</button>
    </div> -->
    <table class="table-auto w-full my-6 rounded-lg overflow-hidden text-sm text-slate-700">
        <thead>
            <tr class="text-left bg-primary">
                <th class="px-4 py-2"></th>
                <th class="px-2 py-2 hidden sm:table-cell">ID</th>
                <th class="px-4 py-2">Thông tin sản phẩm</th>
                <th class="px-4 py-2 hidden sm:table-cell">Màu sắc</th>
                <th class="px-4 py-2">Thương hiệu</th>
                <th class="px-4 py-2 hidden sm:table-cell">Danh mục</th>
                <th class="px-4 py-2">Đơn giá</th>
                <th class="px-4 py-2">Giá giảm</th>
                <th class="px-4 py-2 hidden sm:table-cell">Số lượng</th>
                <th class="px-4 py-2">Trạng thái</th>
                <th class="px-4 py-2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $index => $product)
            <tr class="{{ $index % 2 == 0 ? 'bg-secondary' : 'bg-pale-dark' }} ">
                <td class="px-2 pt-2"><input type="checkbox"></td>
                <td class="px-4 pt-2 hidden sm:table-cell">{{ $product->id }}</td>
                <td class="px-4 py-2 ">
                    <div class="flex">
                        <img src="{{ asset($product->primary_image_url ?? 'placeholder.jpg') }}" width="50" alt="" class="hidden sm:table-cell">
                        <div class="pl-2">
                            <p class="w-80">{{ $product->product_name }}</p>
                            <span>{{ $product->product_code }}</span>
                        </div>
                    </div>
                </td>
                <td class="px-4 pt-2 hidden sm:table-cell">{{ Illuminate\Support\Str::limit($product->color, 6) }}</td>
                <td class="px-4 pt-2">{{ $product->brand->brand_name }}</td>
                <td class="px-4 pt-2 hidden sm:table-cell">{{ $product->category->category_name }}</td>
                <td class="px-4 pt-2">{{ number_format($product->price) }} VND</td>
                <td class="px-4 pt-2">{{ number_format($product->price_sale) }} VND</td>
                <td class="px-4 pt-2 hidden sm:table-cell">{{ $product->quantity }}</td>
                <td class="pr-4 pt-4 status-cell flex items-center justify-center">
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
                        <select class="status-select bg-primary border-0 rounded-md outline-none text-sm p-1 m-0 pr-12" data-order-id="{{ $product->id }}">
                            <option class="text-sm" value="1" {{ $product->status == '1' ? 'selected' : '' }}>Còn hàng</option>
                            <option class="text-sm" value="2" {{ $product->status == '2' ? 'selected' : '' }}>Hết hàng</option>
                            <option class="text-sm" value="3" {{ $product->status == '3' ? 'selected' : '' }}>Đã xóa</option>
                        </select>
                    </div>
                </td>
                <td class="px-4">
                    <div x-data="{ isOpen: false }" x-init="() => { isOpen = false }" @click.away="isOpen = false" class="detail-btn">
                        <button @click="isOpen = !isOpen" class="text-white pl-4 focus:outline-none hover:text-sky-500 text-2xl relative">
                            <span class="inline-block">...</span>
                            <span class="absolute top-0 right-0 bg-white rounded-full h-3 w-3 transform translate-x-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition duration-300"></span>
                        </button>
                        <div x-show="isOpen" class="absolute right-8 mt-2 w-20 bg-main border rounded-md shadow-lg z-10" @click="isOpen = false">
                            <a href="{{ route('edit_product', ['id' => $product->id]) }}" class="block pl-4 py-2 text-white hover:bg-gray-800 rounded-md ">Sửa</a>
                            <form action="{{ route('delete_product', ['id' => $product->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="block w-full text-left pl-4 py-2 text-red-500 hover:bg-gray-800 hover:text-red-600 rounded-md ">Xóa</button>
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