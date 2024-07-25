<style>
    .category_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }

    .trix-contents {
        max-height: 400px;
        overflow-y: auto;
        min-height: 400px;
    }
</style>

@include('admin.layout.header')

<div class="mx-8 pt-20 font-sans antialiased w-full text-slate-700">
    <div class="text-base flex items-center mb-8 text-slate-400">
        <a class="hover:text-slate-50" href="{{ route('admin') }}"><ion-icon name="home"></ion-icon></a>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <span>Manage</span>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <a class="hover:text-slate-50" href="{{ route('category') }}"><span>Danh mục</span></a>
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
    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="w-full">
            <h2 class="text-2xl font-semibold text-white mb-8">Sửa loại</h2>
            <div class="bg-slate-200 p-8 rounded-lg shadow-lg w-full">
                <div class=" grid lg:grid-cols-2 sm:grid-cols-1 gap-4">
                    <div class="p-4">
                        <div class=" gap-4 mb-10">
                            <div class="mb-4">
                                <label for="category_name" class="block text-sm font-medium leading-6  mb-2">Tên loại</label>
                                <input type="text" name="category_name" id="category_name" class="block w-full rounded-md border-0 py-1.5   shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{$category -> category_name}}" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="mb-10">
                                <label class="block text-sm font-medium leading-6  mb-2">Nổi bật</label>
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
                            <div class="mb-10">
                                <label for="status" class="block text-sm font-medium leading-6  mb-2">Trạng thái</label>
                                <select name="status" id="status" class="block w-full rounded-md border-0 py-1.5   shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                                    <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Còn hàng</option>
                                    <option value="2" {{ $category->status == 2 ? 'selected' : '' }}>Hết hàng</option>
                                    <option value="3" {{ $category->status == 3 ? 'selected' : '' }}>Đã xóa</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="mb-10">
                                <label class="block text-sm font-medium leading-6  mb-2">Hiển thị trang chính</label>
                                <div class="flex items-center space-x-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="is_featured_home" value="yes" {{ $category->is_featured_home ? 'checked' : '' }} class="form-radio text-blue-600">
                                        <span class="ml-2">Có</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="is_featured_home" value="no" {{ !$category->is_featured_home ? 'checked' : '' }} class="form-radio text-blue-600">
                                        <span class="ml-2">Không</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mb-10">
                                <label class="block text-sm font-medium leading-6  mb-2">Build PC</label>
                                <div class="flex items-center space-x-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="build_pc" value="yes" {{ $category->build_pc ? 'checked' : '' }} class="form-radio text-blue-600">
                                        <span class="ml-2">Có</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="build_pc" value="no" {{ !$category->build_pc ? 'checked' : '' }} class="form-radio text-blue-600">
                                        <span class="ml-2">Không</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-4">
                            <div class="mb-10">
                                <label for="image" class="block text-sm font-medium leading-6  mb-2">Hình ảnh</label>
                                @if ($category->image)
                                <img src="{{ asset($category->image) }}" alt="Current Image" class="w-32 mb-2">
                                @endif
                                <input type="file" name="image" id="image" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="mb-10">
                            <label for="description" class="block text-sm font-medium leading-6  mb-2">Mô tả loại</label>
                            <input id="description" type="hidden" name="description">
                            <trix-editor class="trix-contents" input="description">{!! ($category -> description) !!}</trix-editor>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end ">
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