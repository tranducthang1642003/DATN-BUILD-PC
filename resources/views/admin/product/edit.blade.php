<style>
    .product_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>
@include('admin.layout.header')

<div class="mx-8 pt-20 text-slate-700 w-full">
    <div class="text-base flex items-center mb-8 text-slate-400">
        <a class="hover:text-slate-50" href="{{ route('admin') }}"><ion-icon name="home"></ion-icon></a>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <span>Manage</span>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <a class="hover:text-slate-50" href="{{ route('product') }}"><span>Sản phẩm</span></a>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <span>Chỉnh sửa</span>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
    @endif
    <form action="{{ route('update_product', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="w-full">
            <h2 class="text-2xl text-white font-semibold mb-8">Chỉnh sửa Sản phẩm</h2>
            <div class="bg-slate-200 p-8 rounded-lg shadow-lg w-full grid lg:grid-cols-2 sm:grid-cols-1 gap-4">
                <div class="p-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-4">
                        <div class="mb-4">
                            <label for="product_name" class="block text-sm font-medium leading-6  mb-2">Tên Sản phẩm</label>
                            <input type="text" name="product_name" id="product_name" class="block w-full rounded-md border-0 py-1.5  shadow-sm  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $product->product_name }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="color" class="block text-sm font-medium leading-6  mb-2">Màu sắc</label>
                            <input type="text" name="color" id="color" class="block w-full rounded-md border-0 py-1.5  shadow-sm  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $product->color }}" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-4">
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium leading-6  mb-2">Giá gốc</label>
                            <input type="number" name="price" id="price" class="block w-full rounded-md border-0 py-1.5  shadow-sm  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ number_format($product->price) }} VND }}" required>
                            <span id="price-error" class="text-red-500 text-sm"></span>
                        </div>
                        <div class="mb-4">
                            <label for="price_sale" class="block text-sm font-medium leading-6  mb-2">Giá giảm</label>
                            <input type="number" name="price_sale" id="price_sale" class="block w-full rounded-md border-0 py-1.5  shadow-sm  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ number_format($product->price_sale) }} VND }}" required>
                            <span id="price_sale-error" class="text-red-500 text-sm"></span>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-4">
                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium leading-6  mb-2">Số lượng</label>
                            <input type="number" name="quantity" id="quantity" class="block w-full rounded-md border-0 py-1.5  shadow-sm  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $product->quantity }}" required>
                            <span id="quantity-error" class="text-red-500 text-sm"></span>
                        </div>
                        <div class="mb-4">
                            <label for="sale" class="block text-sm font-medium leading-6  mb-2">Sale</label>
                            <select name="sale" id="sale" class="block w-full rounded-md border-0 py-1.5  shadow-sm  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                                <option value="yes" {{ $product->featured ? 'selected' : '' }}>Có</option>
                                <option value="no" {{ !$product->featured ? 'selected' : '' }}>Không</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-4">
                        <div class="pb-4 my-4">
                            <label for="brand_id" class="block text-sm font-medium leading-6  mb-2">Thương hiệu</label>
                            <select name="brand_id" id="brand_id" class="block w-full rounded-md border-0 py-1.5  shadow-sm  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="pb-4 my-4">
                            <label for="category_id" class="block text-sm font-medium leading-6  mb-2">Danh mục</label>
                            <select name="category_id" id="category_id" class="block w-full rounded-md border-0 py-1.5  shadow-sm  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-4">
                        <div class="pb-4 my-4">
                            <label for="product_code" class="block text-sm font-medium leading-6  mb-2">Mã Sản phẩm</label>
                            <input type="text" name="product_code" id="product_code" class="block w-full rounded-md border-0 py-1.5  shadow-sm  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $product->product_code }}" required>
                        </div>
                        <div class="pb-4 my-4">
                            <label for="stock" class="block text-sm font-medium leading-6  mb-2">Tồn kho</label>
                            <input type="number" name="stock" id="stock" class="block w-full rounded-md border-0 py-1.5  shadow-sm  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $product->stock }}" required>
                            <span id="stock-error" class="text-red-500 text-sm"></span>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-4">
                        <div class="mb-4">
                            <label for="image_primary" class="block text-sm font-medium leading-6  mb-2">Hình ảnh chính</label>
                            <input type="file" name="image" id="image_primary" accept="image/*">
                            @if ($primaryImage)
                            <div class="mt-2">
                                <img src="{{ asset($primaryImage->image_path) }}" alt="Hình ảnh chính" class="h-32">
                            </div>
                            @endif
                        </div>
                        <div class="mb-4">
                            <label for="image_secondary" class="block text-sm font-medium leading-6  mb-2">Hình ảnh phụ (chọn nhiều)</label>
                            <input type="file" name="additional_images[]" id="image_secondary" accept="image/*" multiple>
                            <div class="flex flex-wrap">
                                @foreach ($secondaryImages as $image)
                                <div class="flex items-center justify-center mt-4 mr-4 mb-4">
                                    <img src="{{ asset($image->image_path) }}" alt="Hình ảnh phụ" class="h-24 w-auto">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium leading-6  mb-2">Mô tả Sản phẩm</label>
                        <input id="description" type="hidden" name="description">
                        <trix-editor class="trix-content" input="description" value="">{!! $product->description !!}</trix-editor>
                    </div>

                    <div class="mb-4">
                        <label for="specifications" class="block text-sm font-medium leading-6  mb-2">Thông số kỹ thuật</label>
                        <input id="specifications" type="hidden" name="specifications">
                        <trix-editor class="trix-content" input="specifications" value="">{!! $product->specifications !!}</trix-editor>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="featured" class="block text-sm font-medium leading-6  mb-2">Nổi bật</label>
                            <select name="featured" id="featured" class="block w-full rounded-md border-0 py-1.5  shadow-sm  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                                <option value="yes" {{ $product->featured ? 'selected' : '' }}>Có</option>
                                <option value="no" {{ !$product->featured ? 'selected' : '' }}>Không</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium leading-6  mb-2">Trạng thái</label>
                            <select name="status" id="status" class="block w-full rounded-md border-0 py-1.5  shadow-sm  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Còn hàng</option>
                                <option value="2" {{ $product->status == 2 ? 'selected' : '' }}>Hết hàng</option>
                                <option value="3" {{ $product->status == 3 ? 'selected' : '' }}>Đã xóa</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-700">Cập nhật Sản phẩm</button>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const priceInput = document.getElementById('price');
        const saleInput = document.getElementById('sale');
        const quantityInput = document.getElementById('quantity');
        const stockInput = document.getElementById('stock');
        const priceError = document.getElementById('price-error');
        const saleError = document.getElementById('sale-error');
        const quantityError = document.getElementById('quantity-error');
        const stockError = document.getElementById('stock-error');

        function validateInput(input, errorElement, validationFn) {
            if (!validationFn(input.value)) {
                errorElement.textContent = 'Giá trị không hợp lệ.';
                input.classList.add('border-red-500');
                return false;
            } else {
                errorElement.textContent = '';
                input.classList.remove('border-red-500');
                return true;
            }
        }

        function validateForm() {
            let valid = true;
            valid = validateInput(priceInput, priceError, value => value > 0);
            valid = validateInput(saleInput, saleError, value => value >= 0) && valid;
            valid = validateInput(quantityInput, quantityError, value => value >= 0) && valid;
            valid = validateInput(stockInput, stockError, value => value >= 0) && valid;
            return valid;
        }
        priceInput.addEventListener('input', () => validateInput(priceInput, priceError, value => value > 0));
        saleInput.addEventListener('input', () => validateInput(saleInput, saleError, value => value >= 0));
        quantityInput.addEventListener('input', () => validateInput(quantityInput, quantityError, value => value >= 0));
        stockInput.addEventListener('input', () => validateInput(stockInput, stockError, value => value >= 0));
        form.addEventListener('submit', function(event) {
            if (!validateForm()) {
                event.preventDefault();
            }
        });
    });
</script>
@include('admin.layout.fotter')