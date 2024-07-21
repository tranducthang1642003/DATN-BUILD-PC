<style>
    .brand_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>
@include('admin.layout.header')
<div class="mx-8 pt-20 w-full">
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
                    <button type="submit" class="bg-main text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-md">Tìm kiếm</button>
                </div>
            </form>
        </div>
        @if (session('success'))
        <div id="alert" class="border-t-4 border-teal-500 rounded-b px-4 py-3 shadow-md" style="background-color: #4CAF50; color: #fff" role="alert">
            <p class="font-bold">{{ session('success') }}</p>
        </div>
        @elseif (session('errors'))
        <div id="alert" class="border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md" style="background-color: #f44336; color: #fff" role="alert">
            <p class="font-bold">{{ session('errors') }}</p>
        </div>
        @endif
    </div>
    <table class="table-auto text-sm w-full my-6 rounded-lg overflow-hidden">
        <thead>
            <tr class="text-left bg-main">
                <th class="px-4 py-2"></th>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Tên</th>
                <th class="px-4 py-2">Nổi bật</th>
                <th class="px-4 py-2">Trạng thái</th>
                <th class="px-4 py-2">Đường dẫn</th>
                <th class="px-4 py-2">Mô tả</th>
                <th class="px-4 py-2">Last Update</th>
                <th class="px-4 py-2">...</th>
            </tr>
        </thead>
        <tbody>
            @foreach($brands as $index => $brand)
            <tr class="{{ $index % 2 == 0 ? 'bg-darks' : 'bg-main' }}">
                <td class="px-4 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2">{{ $brand->id }}</td>
                <td class="px-4 py-2">{{ $brand->brand_name }}</td>
                <td class="px-4 py-2">
                    @php
                    $featuredLabels = [
                    0 => 'Không',
                    1 => 'Có',
                    ];
                    @endphp

                    {{ $featuredLabels[$brand->featured] ?? 'Không xác định' }}
                </td>
                <td class="px-4 py-2">
                    @php
                    $statusLabels = [
                    1 => 'Còn hàng',
                    2 => 'Hết hàng',
                    3 => 'Đã xóa'
                    ];
                    @endphp

                    {{ $statusLabels[$brand->status] ?? 'Không xác định' }}
                </td>
                <td class="px-4 py-2">{{ $brand->slug }}</td>
                <td class="px-4 py-2">{{ $brand->description }}</td>
                <td class="px-4 py-2">{{ $brand->updated_at }}</td>
                <td class="px-4 py-2">
                    <div x-data="{ isOpen: false }" x-init="() => { isOpen = false }" @click.away="isOpen = false" class="detail-btn">
                        <button @click="isOpen = !isOpen" class="text-white pl-4 pt-2 focus:outline-none text-2xl">...</button>
                        <div x-show="isOpen" class="absolute right-8 mt-2 w-20 bg-main border rounded-md shadow-lg z-10" @click="isOpen = false">
                            <a href="{{ route('brand.edit', ['id' => $brand->id]) }}" class="block pl-4 py-2 text-white hover:bg-gray-800">Sửa</a>
                            <form action="{{ route('delete_brand', ['id' => $brand->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="block w-full text-left pl-4 py-2 text-red-500 hover:bg-gray-800 hover:text-red-600">Xóa</button>
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
            {{ $brands->links() }}
        </div>
    </div>
</div>
</div>
@include('admin.layout.fotter')

<script>
    setTimeout(function() {
        document.getElementById('alert').style.display = 'none';
    }, 3000);
</script>