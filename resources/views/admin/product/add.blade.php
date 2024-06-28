<style>
    .products_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>

@include('admin.layout.header')

<div class="bg-gray-100 font-sans antialiased flex-grow p-5 ml-10">
    <form action="{{ route('add_product') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="min-h-screen bg-gray-100 flex justify-center items-center">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
                <h2 class="text-2xl font-semibold text-gray-800 mb-8">Thêm Sản Phẩm Mới</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="product_name" class="block text-sm font-medium text-gray-700 mb-1">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="product_name" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Nhập tên sản phẩm" required>
                    </div>
                    <div class="mb-4">
                        <label for="color" class="block text-sm font-medium text-gray-700 mb-1">Màu sắc</label>
                        <input type="color" name="color" id="color" class="" required>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Giá bán</label>
                        <input type="number" name="price" id="price" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Nhập giá bán" required>
                    </div>
                    <div class="mb-4">
                        <label for="sale" class="block text-sm font-medium text-gray-700 mb-1">Khuyến mãi</label>
                        <input type="number" name="sale" id="sale" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Nhập khuyến mãi" required>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Số lượng</label>
                        <input type="number" name="quantity" id="quantity" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Nhập số lượng" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Danh mục</label>
                    <select name="category_id" id="category_id" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" required>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="brand_id" class="block text-sm font-medium text-gray-700 mb-1">Thương hiệu</label>
                    <select name="brand_id" id="brand_id" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" required>
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="image_primary" class="block text-sm font-medium text-gray-700 mb-1">Ảnh chính</label>
                    <input type="file" name="image_primary" id="image_primary" accept="image/*" required>
                </div>
                <div class="mb-4">
                    <label for="image_secondary" class="block text-sm font-medium text-gray-700 mb-1">Ảnh phụ (chọn nhiều ảnh)</label>
                    <input type="file" name="image_secondary[]" id="image_secondary" accept="image/*" multiple>
                </div>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Mô tả sản phẩm</label>
                    <input id="description" type="hidden" name="description">
                    <trix-editor input="description"></trix-editor>
                </div>

                <div class="mb-4">
                    <label for="specifications" class="block text-sm font-medium text-gray-700 mb-1">Thông số kỹ thuật</label>
                    <input id="specifications" type="hidden" name="specifications">
                    <trix-editor input="specifications"></trix-editor>
                </div>

                <div class="mb-4">
                    <label for="featured" class="block text-sm font-medium text-gray-700 mb-1">Nổi bật</label>
                    <select name="featured" id="featured" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" required>
                        <option value="yes">Có</option>
                        <option value="no">Không</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Trạng thái</label>
                    <select name="status" id="status" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" required>
                        <option value="1">Còn hàng</option>
                        <option value="2">Hết hàng</option>
                        <option value="3">Đã xóa</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="product_code" class="block text-sm font-medium text-gray-700 mb-1">Mã sản phẩm</label>
                    <input type="text" name="product_code" id="product_code" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Nhập mã sản phẩm" required>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Thêm Sản Phẩm</button>
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