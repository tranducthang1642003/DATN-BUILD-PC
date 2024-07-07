<style>
    .blog_category_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>
@include('admin.layout.header')
<div class="m-4 pt-20">
    <div class="flex justify-between text-xs sm:text-sm">
        <div class="flex text-gray-600">
            <form action="{{ route('blog_category') }}" method="GET" class="flex">
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
                    <button type="submit" class="bg-indigo-600 text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-md">Tìm kiếm</button>
                </div>
            </form>
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
                <th class="px-4 py-2">Tiêu đề</th>
                <th class="px-4 py-2 hidden sm:table-cell">Hình ảnh</th>
                <th class="px-4 py-2">Slug</th>
                <th class="px-4 py-2 hidden sm:table-cell">Nổi bật</th>
                <th class="px-4 py-2 hidden sm:table-cell">Danh mục</th>
                <th class="px-4 py-2">Người tạo</th>
                <th class="px-4 py-2">Nội dung</th>
                <th class="px-4 py-2">...</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blog_categorys as $index => $blog_category)
            <tr class="{{ $index % 2 == 0 ? 'bg-gray-200' : 'bg-gray-100' }}">
                <td class="px-2 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2 hidden sm:table-cell">{{ $blog_category->id }}</td>
                <td class="px-4 py-2 product-name">{{ $blog_category->title }}</td>
                <td class="px-4 py-2"><img src="{{ asset($blog_category->blog_category_image) }}" alt="" width="60"></td>
                <td class="px-4 py-2 hidden sm:table-cell">{{ Illuminate\Support\Str::limit($blog_category->slug, 6) }}</td>
                <td class="px-4 py-2 hidden sm:table-cell">{{ $blog_category->featured }}</td>
                <td class="px-4 py-2">{{ $blog_category->category_blog_category->name }}</td>
                <td class="px-4 py-2 hidden sm:table-cell">{{ $blog_category->users->name }}</td>
                <td class="px-4 py-2 hidden sm:table-cell product-name">{!! ($blog_category->content) !!}</td>
                <td class="px-4 py-2">
                    <div x-data="{ isOpen: false }" x-init="() => { isOpen = false }" @click.away="isOpen = false">
                        <button @click="isOpen = !isOpen" class="text-gray-700 px-4 py-2 rounded-md focus:outline-none focus:bg-gray-300 hover:bg-gray-300 text-2xl">...</button>
                        <div x-show="isOpen" class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-10" @click="isOpen = false">
                            <a href="{{ route('edit_blog_category', ['id' => $blog_category->id]) }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Sửa</a>
                            <form action="{{ route('delete_blog_category', ['id' => $blog_category->id]) }}" method="POST">
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
            {{ $blog_categorys->links() }}
        </div>
    </div>
</div>
</div>
@include('admin.layout.fotter')