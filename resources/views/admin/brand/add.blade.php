<style>
    .brand_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }

    .trix-contents {
        max-height: 280px;
        overflow-y: auto;
        min-height: 280px;
    }
</style>

@include('admin.layout.header')

<div class="m-4 pt-20 font-sans antialiased">
    <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="w-full">
            <h2 class="text-2xl font-semibold text-slate-800 mb-8">Thêm mới Thương hiệu</h2>
            <div class="bg-white p-8 rounded-lg shadow-lg w-full grid lg:grid-cols-2 sm:grid-cols-1 gap-4">
                <div class="p-4">
                    <div class=" gap-4 mb-10">
                        <div class="mb-4">
                            <label for="brand_name" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Tên Thương hiệu</label>
                            <input type="text" name="brand_name" id="brand_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="mb-10">
                            <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Nổi bật</label>
                            <div class="flex items-center space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="featured" value="yes" class="form-radio text-blue-600">
                                    <span class="ml-2">Có</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="featured" value="no" class="form-radio text-blue-600">
                                    <span class="ml-2">Không</span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-10">
                            <label for="status" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Trạng thái</label>
                            <select name="status" id="status" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                                <option value="1">Còn hàng</option>
                                <option value="2">Hết hàng</option>
                                <option value="3">Đã xóa</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Mô tả loại</label>
                        <input id="description" type="hidden" name="description">
                        <trix-editor class="trix-contents" input="description"></trix-editor>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="bg-slate-500 text-white px-6 py-2 rounded-md hover:bg-slate-600 focus:outline-none focus:bg-slate-600">Lưu</button>
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