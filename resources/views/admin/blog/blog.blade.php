<style>
    .blog_active {
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
        <a href="{{ route('add_blog') }}"><button class="bg-indigo-600 text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-md">Thêm mới</button></a>
    </div>
    <table class="table-auto w-full my-6 rounded-lg overflow-hidden text-sm">
        <thead>
            <tr class="text-left bg-main">
                <th class="px-2 py-2 hidden sm:table-cell">ID</th>
                <th class="px-4 py-2">Tiêu đề</th>
                <th class="px-4 py-2 hidden sm:table-cell">Hình ảnh</th>
                <th class="px-4 py-2 hidden sm:table-cell">Danh mục</th>
                <th class="px-4 py-2">Nội dung</th>
                <th class="px-4 py-2">...</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $index => $blog)
            <tr class="{{ $index % 2 == 0 ? 'bg-darks' : 'bg-main' }}">
                <td class="px-4 py-2 hidden sm:table-cell">{{ $blog->id }}</td>
                <td class="px-4 py-2 product-name">{{ Illuminate\Support\Str::limit($blog->title, 20) }}</td>
                <td class="px-4 py-2"><img src="{{ asset($blog->blog_image) }}" alt="" width="100"></td>
                <td class="px-4 py-2">{{ $blog->category_blog->name }}</td>
                <td class="px-4 py-2 hidden sm:table-cell max-w-80 max-h-20">{!! Illuminate\Support\Str::limit($blog->content, 400) !!}</td>
                <td class="px-4 py-2">
                    <div x-data="{ isOpen: false }" x-init="() => { isOpen = false }" @click.away="isOpen = false" class="detail-btn">
                        <button @click="isOpen = !isOpen" class="text-white pl-4 pt-2 focus:outline-none text-2xl">...</button>
                        <div x-show="isOpen" class="absolute right-16 mt-2 w-20 bg-main border rounded-md shadow-lg z-10" @click="isOpen = false">
                            <a href="{{ route('edit_blog', ['id' => $blog->id]) }}" class="block pl-4 py-2 text-white hover:bg-gray-800">Sửa</a>
                            <form action="{{ route('delete_blog', ['id' => $blog->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="block w-full text-left pl-4 py-2 text-red-400 hover:bg-gray-800 hover:text-red-500">Xóa</button>
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
            {{ $blogs->links() }}
        </div>
    </div>
</div>
</div>
@include('admin.layout.fotter')