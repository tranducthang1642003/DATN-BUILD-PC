<style>
    .products_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>

@include('admin.layout.header')

<div class="bg-gray-100 font-sans antialiased flex-grow p-5 ml-10">
    <form action="{{ route('add_category') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="min-h-screen bg-gray-100 flex justify-center items-center">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
                <h2 class="text-2xl font-semibold text-gray-800 mb-8">Thêm loại</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="Tên" class="block text-sm font-medium text-gray-700 mb-1">Tên</label>
                        <input type="text" name="category_name" id="category_name" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter Name" required>
                    </div>
                    <div class="mb-4">
                        <label for="Đường dẫn" class="block text-sm font-medium text-gray-700 mb-1">Đường dẫn</label>
                        <input type="text" name="slug" id="slug" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Enter color" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="featured" class="block text-sm font-medium text-gray-700 mb-1">Nổi bật</label>
                    <select name="featured" id="featured" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" required>
                        <option value="yes">Có</option>
                        <option value="no">Không</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="Trạng thái" class="block text-sm font-medium text-gray-700 mb-1">Trạng thái</label>
                    <select name="status" id="status" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" required>
                        <option value="1">Còn hàng</option>
                        <option value="2">Hết hàng</option>
                        <option value="3">Đã xóa</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Mô tả loại</label>
                    <textarea name="description" id="description" rows="3" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Nhập mô tả sản phẩm" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Mã loại</label>
                    <input type="text" name="product_code" id="product_code" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Nhập đường dẫn sản phẩm" required>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>

@include('admin.layout.fotter')