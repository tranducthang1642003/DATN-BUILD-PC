<style>
    .product_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>
@include('admin.layout.header')

<div class="m-4 pt-20">
    <form action="{{ route('update_product', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="w-full">
            <h2 class="text-2xl font-semibold text-slate-800 mb-8">Chỉnh sửa Sản phẩm</h2>
            <div class="bg-white p-8 rounded-lg shadow-lg w-full grid lg:grid-cols-2 sm:grid-cols-1 gap-4">
                <div class="p-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-4">
                        <div class="mb-4">
                            <label for="product_name" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Tên Sản phẩm</label>
                            <input type="text" name="product_name" id="product_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $product->product_name }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="color" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Màu sắc</label>
                            <input type="color" name="color" id="color" value="{{ $product->color }}" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-4">
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Đơn giá</label>
                            <input type="number" name="price" id="price" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $product->price }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="stock" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Tồn kho</label>
                            <input type="number" name="stock" id="stock" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $product->stock }}" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-4">
                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Số lượng</label>
                            <input type="number" name="quantity" id="quantity" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $product->quantity }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Danh mục</label>
                            <select name="category_id" id="category_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="pb-4 my-4">
                        <label for="brand_id" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Thương hiệu</label>
                        <select name="brand_id" id="brand_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                            @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->brand_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-4">
                        <div class="pb-4 my-4">
                            <label for="product_code" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Mã Sản phẩm</label>
                            <input type="text" name="product_code" id="product_code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $product->product_code }}" required>
                        </div>
                        <div class="pb-4 my-4">
                            <label for="sale" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Giảm giá</label>
                            <select name="sale" id="sale" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                                <option value="yes" {{ $product->sale ? 'selected' : '' }}>Có</option>
                                <option value="no" {{ !$product->sale ? 'selected' : '' }}>Không</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-4">
                        <div class="mb-4">
                            <label for="image_primary" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Hình ảnh chính</label>
                            <input type="file" name="image" id="image_primary" accept="image/*">
                            @if ($primaryImage)
                            <div class="mt-2">
                                <img src="{{ asset($primaryImage->image_path) }}" alt="Hình ảnh chính" class="h-32">
                            </div>
                            @endif
                        </div>
                        <div class="mb-4">
                            <label for="image_secondary" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Hình ảnh phụ (chọn nhiều)</label>
                            <input type="file" name="additional_images[]" id="image_secondary" accept="image/*" multiple>
                            <div class="flex flex-wrap">
                                @foreach ($secondaryImages as $image)
                                <div class="mt-2 mr-2 mb-2">
                                    <img src="{{ asset($image->image_path) }}" alt="Hình ảnh phụ" class="h-24">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Mô tả Sản phẩm</label>
                        <input id="description" type="hidden" name="description">
                        <trix-editor class="trix-content" input="description" value="">{!! $product->description !!}</trix-editor>
                    </div>

                    <div class="mb-4">
                        <label for="specifications" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Thông số kỹ thuật</label>
                        <input id="specifications" type="hidden" name="specifications">
                        <trix-editor class="trix-content" input="specifications" value="">{!! $product->specifications !!}</trix-editor>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="featured" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Nổi bật</label>
                            <select name="featured" id="featured" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                                <option value="yes" {{ $product->featured ? 'selected' : '' }}>Có</option>
                                <option value="no" {{ !$product->featured ? 'selected' : '' }}>Không</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Trạng thái</label>
                            <select name="status" id="status" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Còn hàng</option>
                                <option value="2" {{ $product->status == 2 ? 'selected' : '' }}>Hết hàng</option>
                                <option value="3" {{ $product->status == 3 ? 'selected' : '' }}>Đã xóa</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="bg-slate-500 text-white px-6 py-2 rounded-md hover:bg-slate-600 focus:outline-none focus:bg-slate-700">Cập nhật Sản phẩm</button>
                    </div>
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