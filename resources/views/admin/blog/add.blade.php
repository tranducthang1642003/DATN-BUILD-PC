<style>
    .blog_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }

</style>

@include('admin.layout.header')

<div class="bg-gray-100 font-sans antialiased flex-grow p-5 ml-10">
    <form action="{{ route('add_blog') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="w-full bg-gray-100">
            <h2 class="text-2xl font-semibold text-gray-800 mb-8">Bài viết mới</h2>
            <div class="bg-white p-8 rounded-lg shadow-lg w-full">
                <div class="grid grid-cols-3 gap-4">
                    <div class="mb-4 col-span-2">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Tiêu đề</label>
                        <input type="text" name="title" id="title" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="featured" class="block text-sm font-medium text-gray-700 mb-1">Nổi bật</label>
                        <select name="featured" id="featured" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" required>
                            <option value="1">Có</option>
                            <option value="0">Không</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div class="mb-4 col-span-2">
                        <label for="blog_image" class="block text-sm font-medium text-gray-700 mb-1">Hình ảnh chính</label>
                        <input type="file" name="blog_image" id="blog_image" accept="image/*">
                    </div>
                    <div class="mb-4">
                        <label for="category_blog_id" class="block text-sm font-medium text-gray-700 mb-1">Danh mục</label>
                        <select name="category_blog_id" id="category_blog_id" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" required>
                            @foreach($category_blog as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Mô tả Sản phẩm</label>
                    <input id="content" type="hidden" name="content">
                    <trix-editor class="trix-content" style="min-height: 600px;" input="content"></trix-editor>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@include('admin.layout.fotter')