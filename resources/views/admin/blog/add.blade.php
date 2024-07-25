<style>
    .blog_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>

@include('admin.layout.header')

<div class="mx-8 pt-20 w-full text-slate-700">
    <div class="text-base flex items-center mb-8 text-slate-400">
        <a class="hover:text-slate-50" href="{{ route('admin') }}"><ion-icon name="home"></ion-icon></a>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <span>Manage</span>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <a class="hover:text-slate-50" href="{{ route('blog') }}"><span>Bài viết</span></a>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <a class="hover:text-slate-50" href="{{ route('add_blog') }}"><span>Thêm mới</span></a>
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
    <form action="{{ route('add_blog') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="w-full">
            <div class="bg-slate-200 p-8 rounded-lg shadow-lg w-full">
                <h2 class=" text-center mb-4 text-2xl font-bold leading-9 tracking-tight">Bài viết mới</h2>
                <div class="grid grid-cols-3 gap-4">
                    <div class="mb-4 col-span-2">
                        <label for="title" class="block text-sm font-medium leading-6  mb-2">Tiêu đề</label>
                        <input type="text" name="title" id="title" class="border border-gray-300 rounded-md px-4 py-2  w-full focus:outline-none focus:border-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="featured" class="block text-sm font-medium leading-6  mb-2">Nổi bật</label>
                        <select name="featured" id="featured" class="border border-gray-300 rounded-md px-4 py-2  w-full focus:outline-none focus:border-blue-500" required>
                            <option value="1">Có</option>
                            <option value="0">Không</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div class="mb-4 col-span-2">
                        <label for="blog_image" class="block text-sm font-medium leading-6  mb-2">Hình ảnh chính</label>
                        <input type="file" name="blog_image" id="blog_image" accept="image/*">
                    </div>
                    <div class="mb-4">
                        <label for="category_blog_id" class="block text-sm font-medium leading-6  mb-2">Danh mục</label>
                        <select name="category_blog_id" id="category_blog_id" class="border border-gray-300 rounded-md px-4 py-2  w-full focus:outline-none focus:border-blue-500" required>
                            @foreach($category_blog as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium leading-6  mb-2">Mô tả Sản phẩm</label>
                    <input id="content" type="hidden" name="content">
                    <trix-editor class="trix-content" style="min-height: 400px;" input="content"></trix-editor>
                </div>
                <input type="hidden" name="user_id" id="" value="{{ Auth::user()->id }}">
                <div class="flex justify-end mt-6">
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