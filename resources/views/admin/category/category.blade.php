@include('admin.layout.header')

<style>
    .category_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>

<div class="flex-grow p-5 ml-10">
    <div class="flex justify-between text-sm">
        <div class="flex text-gray-600">
            <form action="{{ route('category') }}" method="GET" class="flex">
                <div>
                    <label for="startDate">Từ ngày</label>
                    <input class="p-2 rounded-lg ml-2" type="date" id="startDate" name="start_date">
                </div>
                <div class="ml-4">
                    <label for="endDate">Đến ngày</label>
                    <input class="p-2 rounded-lg ml-2" type="date" id="endDate" name="end_date">
                </div>
                <div class="ml-6">
                    <div class="relative rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <span class="text-gray-500 sm:text-sm"><ion-icon name="search-outline"></ion-icon></span>
                        </div>
                        <input type="text" name="keyword" id="keyword" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Tìm kiếm">
                    </div>
                </div>
                <div class="ml-6">
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md">Tìm kiếm</button>
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
    <table class="table-auto w-full my-6 rounded-lg overflow-hidden">
        <thead>
            <tr class="text-left bg-gray-400">
                <th class="px-4 py-2"></th>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Hình ảnh</th>
                <th class="px-4 py-2">Tên</th>
                <th class="px-4 py-2">Slug</th>
                <th class="px-4 py-2">Nổi bật</th>
                <th class="px-4 py-2">Mô tả</th>
                <th class="px-4 py-2">...</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $index => $category)
            <tr class="{{ $index % 2 == 0 ? 'bg-gray-200' : 'bg-gray-100' }}">
                <td class="px-4 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2">{{ $category->id }}</td>
                <td class="px-4 py-2"><img class="w-12" src="{{ asset($category->image) }}" alt=""></td>
                <td class="px-4 py-2">{{ $category->category_name }}</td>
                <td class="px-4 py-2">{{ $category->slug }}</td>
                <td class="px-4 py-2">
                    @php
                    $statusLabels = [
                    0 => 'Không',
                    1 => 'Nổi bật',
                    ];
                    @endphp

                    {{ $statusLabels[$category->featured] ?? 'Không xác định' }}
                </td>
                <td class="px-4 py-2 product-name">{{ $category->description }}</td>
                <td class="px-4 py-2">
                    <div x-data="{ isOpen: false }" x-init="() => { isOpen = false }" @click.away="isOpen = false">
                        <button @click="isOpen = !isOpen" class="text-gray-700 px-4 py-2 rounded-md focus:outline-none focus:bg-gray-300 hover:bg-gray-300 text-2xl">...</button>
                        <div x-show="isOpen" class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-10" @click="isOpen = false">
                            <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Sửa</a>
                            <form action="{{ route('delete_category', ['id' => $category->id]) }}" method="POST">
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
            {{ $categories->links() }}
        </div>
    </div>
</div>

@include('admin.layout.fotter')

<script>
    setTimeout(function() {
        document.getElementById('alert').style.display = 'none';
    }, 3000);
</script>