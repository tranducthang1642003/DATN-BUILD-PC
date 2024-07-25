<style>
    .products_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>

@include('admin.layout.header')

<div class="mx-8 pt-20 font-sans antialiased w-full">
    <div class="text-base flex items-center mb-8 text-slate-400">
        <a class="hover:text-slate-50" href="{{ route('admin') }}"><ion-icon name="home"></ion-icon></a>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <span>Manage</span>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <a class="hover:text-slate-50" href="{{ route('vouchers.index') }}"><span>Mã giảm giá</span></a>
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
    <form class="" action="{{ route('vouchers.update', ['id' => $voucher->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="text-slate-700 w-full bg-slate-200 flex justify-center">
            <div class="rounded-lg w-full max-w-6xl min-h-screen">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight">Sửa mã giảm giá</h2>
                <div class="p-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-4">
                        <div class="mb-4">
                            <label for="product_name" class="block text-sm font-medium leading-6  mb-2">Mã giảm giá</label>
                            <input type="text" name="promotion_code" id="promotion_code" class="block w-full rounded-md border-0 py-1.5   shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{$voucher->promotion_code}}" required>
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium leading-6  mb-2">Giá giảm</label>
                            <input type="number" name="discount" id="discount" class="block w-full rounded-md border-0 py-1.5   shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{$voucher->discount}}" required>
                            <div id="discount-error" class="text-red-600 text-sm mt-1 hidden">Giá trị giảm giá phải là một số từ 1 đến 1000000000.</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-4">
                        <div class="mb-4">
                            <label for="start_date" class="block text-sm font-medium leading-6 mb-2">Ngày bắt đầu</label>
                            <input type="date" name="start_date" id="start_date" class="block w-full rounded-md border-0 py-1.5  shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('start_date', $voucher->start_date) }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="end_date" class="block text-sm font-medium leading-6 mb-2">Ngày kết thúc</label>
                            <input type="date" name="end_date" id="end_date" class="block w-full rounded-md border-0 py-1.5  shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('end_date', $voucher->end_date) }}" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="product_id" class="block text-sm font-medium leading-6 mb-2">Áp dụng:</label>
                        <select name="product_id" id="product_id" class="w-full " required>
                            <option value="0">Tất cả</option>
                            @foreach($products as $product)
                            <option class="" value="{{ $product->id }}" {{ old('product_id', $voucher->product_id) == $product->id ? 'selected' : '' }}>
                                {!! Illuminate\Support\Str::limit($product->product_name, 60) !!}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="gap-4">
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium leading-6  mb-2">Mô tả</label>
                            <input id="description" type="hidden" name="description">
                            <trix-editor class="trix-content" input="description" >{!! $voucher->description !!}</trix-editor>
                        </div>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Lưu</button>
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

            if (isNaN(discountValue) || discountValue < 0 || discountValue > 1000000000) {
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