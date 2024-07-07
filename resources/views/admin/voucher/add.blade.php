<style>
    .products_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>

@include('admin.layout.header')

<div class="m-4 pt-20 font-sans antialiased w-full flex justify-center">
    <form class="w-3/5 " action="{{ route('vouchers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="">
            <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 mb-8">Thêm mã giảm giá</h2>
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <div class="p-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-4">
                        <div class="mb-4">
                            <label for="product_name" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Mã giảm giá</label>
                            <input type="text" name="promotion_code" id="promotion_code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập mã giảm" required>
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Giá giảm (%)</label>
                            <input type="number" name="discount" id="discount" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="0 đến 100" required>
                            <div id="discount-error" class="text-red-600 text-sm mt-1 hidden">Giá trị giảm giá phải là một số từ 0 đến 100.</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-4">
                        <div class="mb-4">
                            <label for="product_name" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Ngày bắt đầu</label>
                            <input type="date" name="start_date" id="start_date" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        </div>
                        <div class="mb-4">
                            <label for="product_name" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Ngày kết thúc</label>
                            <input type="date" name="end_date" id="end_date" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="product_name" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Sản phẩm áp dụng:</label>
                        <select name="product_id" id="product_id" class="w-full" required>
                            <option value="">Chọn sản phẩm</option>
                            @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>{{ $product->product_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="gap-4">
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Mô tả</label>
                            <input id="description" type="hidden" name="description">
                            <trix-editor class="trix-content" input="description"></trix-editor>
                        </div>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="bg-slate-500 text-white px-6 py-2 rounded-md hover:bg-slate-600 focus:outline-none focus:bg-slate-600">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const discountInput = document.getElementById('discount');
        const discountError = document.getElementById('discount-error');

        discountInput.addEventListener('input', function() {
            let discountValue = parseInt(discountInput.value);

            if (isNaN(discountValue) || discountValue < 0 || discountValue > 100) {
                discountInput.classList.add('border-red-500');
                discountError.classList.remove('hidden');
            } else {
                discountInput.classList.remove('border-red-500');
                discountError.classList.add('hidden');
            }
        });
    });
</script>

@include('admin.layout.fotter')