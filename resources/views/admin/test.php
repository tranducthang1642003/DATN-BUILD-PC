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
    <form action="{{ route('brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="w-full">
            <h2 class="text-2xl font-semibold text-slate-800 mb-8">Thêm mới Thương hiệu</h2>
            <div class="bg-white p-8 rounded-lg shadow-lg w-full grid lg:grid-cols-2 sm:grid-cols-1 gap-4">
                <div class="p-4">
                    <div class=" gap-4 mb-10">
                        <div class="mb-4">
                            <label for="brand_name" class="block text-sm font-medium text-slate-700 mb-1">Tên Thương hiệu</label>
                            <input type="text" name="brand_name" id="brand_name" class="border border-slate-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" value="{{ $brand->brand_name }} required>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="mb-10">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nổi bật</label>
                            <div class="flex items-center space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="featured" value="yes" {{ $brand->featured ? 'checked' : '' }} class="form-radio text-blue-600">
                                    <span class="ml-2">Có</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="featured" value="no" {{ !$brand->featured ? 'checked' : '' }} class="form-radio text-blue-600">
                                    <span class="ml-2">Không</span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-10">
                            <label for="status" class="block text-sm font-medium text-slate-700 mb-1">Trạng thái</label>
                            <select name="status" id="status" class="border border-slate-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" required>
                                <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>Còn hàng</option>
                                <option value="2" {{ $brand->status == 2 ? 'selected' : '' }}>Hết hàng</option>
                                <option value="3" {{ $brand->status == 3 ? 'selected' : '' }}>Đã xóa</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-slate-700 mb-1">Mô tả loại</label>
                        <input id="description" type="hidden" name="description">
                        <trix-editor class="trix-contents" input="description">{!! ($brand->description) !!}</trix-editor>
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