<style>
    .products_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>

@include('admin.layout.header')

<div class="bg-gray-100 font-sans antialiased flex-grow p-5 ml-10">
    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="min-h-screen bg-gray-100 flex justify-center items-center">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
                <h2 class="text-2xl font-semibold text-gray-800 mb-8">Thêm loại</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="Tên" class="block text-sm font-medium text-gray-700 mb-1">Tên</label>
                        <input type="text" name="category_name" id="category_name" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" value="{{$category -> category_name}}" placeholder="" required>
                    </div>
                    <div class="mb-4">
                        <label for="Đường dẫn" class="block text-sm font-medium text-gray-700 mb-1">Đường dẫn</label>
                        <input type="text" name="slug" id="slug" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" value="{{$category -> slug}}" placeholder="" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nổi bật</label>
                    <div class="flex items-center space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="featured" value="yes" {{ $category->featured ? 'checked' : '' }} class="form-radio text-blue-600">
                            <span class="ml-2">Có</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="featured" value="no" {{ !$category->featured ? 'checked' : '' }} class="form-radio text-blue-600">
                            <span class="ml-2">Không</span>
                        </label>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Trạng thái</label>
                    <select name="status" id="status" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" required>
                        <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Còn hàng</option>
                        <option value="2" {{ $category->status == 2 ? 'selected' : '' }}>Hết hàng</option>
                        <option value="3" {{ $category->status == 3 ? 'selected' : '' }}>Đã xóa</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Mô tả loại</label>
                    <textarea name="description" id="description" rows="3" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" value="" required>{{ $category -> description }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Thêm hình</label>
                    @if ($category->image)
                    <img src="{{ asset($category->image) }}" alt="Current Image" class="w-32">
                    @endif
                    <input type="file" name="image" id="image" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="">
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>

@include('admin.layout.fotter')