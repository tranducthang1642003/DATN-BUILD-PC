<style>
    .menu_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>

@include('admin.layout.header')

<div class="m-4 pt-20 font-sans antialiased w-full flex justify-center">
    <form class="w-3/5 " action="{{ route('add_blog_category') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="">
            <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 mb-8">Thêm Danh mục bài viết</h2>
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <div class="p-4">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Tên danh mục</label>
                        <input type="text" name="name" id="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập tên" required>
                    </div>
                    <div class="w-full mt-6">
                        <button type="submit" class="bg-slate-500 text-white px-6 py-2 rounded-md hover:bg-slate-600 focus:outline-none focus:bg-slate-600">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


@include('admin.layout.fotter')