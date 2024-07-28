<style>
    .setting_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }

    .menu-item {
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .menu-item:hover {
        background-color: #edf2f7;
        color: orange;
    }

    .menu-item.active {
        background-color: #414755;
        font-weight: bold;
    }

    .content-section {
        display: none;
    }

    .content-section.active {
        display: block;
    }
</style>

@include('admin.layout.header')
<div class="mx-8 pt-20 w-full">
    <div class="text-base flex items-center mb-8 text-slate-400">
        <a class="hover:text-slate-50" href="{{ route('admin') }}"><ion-icon name="home"></ion-icon></a>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <span>Others</span>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <span>Cài đặt</span>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <a class="hover:text-slate-50" href="{{ route('settings.index') }}"><span>Banner</span></a>
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
    <div class="w-full mx-auto min-h-screen">
        <div class="flex mb-6 justify-between items-center">
            <div class="flex">
                <div id="menu-banner" class="menu-item px-4 py-2 rounded-md mr-4">Banner</div>
                <div id="menu-poster" class="menu-item px-4 py-2 rounded-md mr-4">Poster</div>
                <div id="menu-logo" class="menu-item px-4 py-2 rounded-md mr-4">Logo</div>
                <div id="menu-category" class="menu-item px-4 py-2 rounded-md mr-4">Danh mục ảnh</div>
            </div>
            <button class="bg-blue-500 hover:bg-blue-6  00 text-white py-2 px-4 rounded-md" onclick="form_add_new()">Thêm mới ảnh</button>
        </div>
        <hr class="mb-4">
        <!-- Nội dung của từng mục -->
        <div id="section-banner" class="content-section">
            <div class="flex justify-between items-center m-4">
                <h2 class="text-xl font-semibold text-white mb-4">Banner top header</h2>
            </div>
            <div class="">
                @foreach ($settingsBannerHorizontal as $setting)
                <div class="bg-slate-200 shadow-md rounded-lg overflow-hidden">
                    <img id="image_banner_{{ $setting->id }}" src="{{ asset($setting->images_url) }}" alt="{{ $setting->name }}" class="w-full max-h-48" width="">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-slate-900 name-btn">{{ $setting->name }}</h2>
                        <div class="mt-4">
                            <div class="flex justify-between content-center mt-4">
                                <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md edit-btn">Chỉnh sửa</button>
                                <a href="{{ route('settings.destroy', $setting->id  ) }}"><button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md ml-2 delete-btn">Xóa</button></a>
                            </div>
                            <form id="edit_form_banner_full_{{ $setting->id }}" action="{{ route('settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data" class="hidden">
                                @csrf
                                @method('PUT')
                                <input type="text" class="text-lg font-semibold text-slate-700" name="name" value="{{ $setting->name }}">
                                <div class="flex justify-between items-center mt-4">
                                    <input type="file" class="w-4/12" name="image" id="image_input_banner_full_{{ $setting->id }}" accept="image/*">
                                    <div class="flex">
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md ml-2">Lưu</button>
                                        <button type="button" class="bg-gray-400 hover: text-white py-2 px-4 rounded-md  cancel-btn">Hủy</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <hr class="my-8">
            <div class="flex justify-between items-center m-4">
                <h2 class="text-xl font-semibold text-white mb-4">Banner</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($settingsBanner as $settingsBanners)
                <div class="bg-slate-200 shadow-md rounded-lg overflow-hidden h-min">
                    <img id="image_banner_full_{{ $settingsBanners->id }}" src="{{ asset($settingsBanners->images_url) }}" alt="Banner" class="w-full">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-slate-900 name-btn">{{ $settingsBanners->name }}</h2>
                        <div class="mt-4">
                            <div class="flex justify-between content-center mt-4">
                                <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md edit-btn">Chỉnh sửa</button>
                                <a href="{{ route('settings.destroy', $settingsBanners->id  ) }}"><button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md ml-2 delete-btn">Xóa</button></a>
                            </div>
                            <form id="edit_form_banner_full_{{ $settingsBanners->id }}" action="{{ route('settings.update', $settingsBanners->id) }}" method="POST" enctype="multipart/form-data" class="hidden">
                                @csrf
                                @method('PUT')
                                <input type="text" class="text-lg font-semibold text-slate-700" name="name" value="{{ $settingsBanners->name }}">
                                <div class="flex justify-between items-center mt-4">
                                    <input type="file" class="w-4/12" name="image" id="image_input_banner_full_{{ $settingsBanners->id }}" accept="image/*">
                                    <div class="flex">
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md ml-2">Lưu</button>
                                        <button type="button" class="bg-gray-400 hover: text-white py-2 px-4 rounded-md  cancel-btn">Hủy</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div id="section-poster" class="content-section">
            <div class="flex justify-between items-center m-4">
                <h2 class="text-xl font-semibold text-white mb-4">Poster</h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                <!-- Thêm hình ảnh và thông tin cho mục Poster -->
                @foreach ($settingsPoster as $settingsPosters)
                <div class="bg-slate-200 shadow-md rounded-lg overflow-hidden">
                    <img id="image_poster_{{ $settingsPosters->id }}" src="{{ asset($settingsPosters->images_url) }}" alt="Poster" width="" class="w-full">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-slate-900 name-btn">{{ $settingsPosters->name }}</h2>
                        <div class="mt-4">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md edit-btn">Chỉnh sửa</button>
                            <a href="{{ route('settings.destroy', $settingsPosters->id  ) }}"><button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md ml-2 delete-btn">Xóa</button></a>
                            <form id="edit_form_poster_{{ $settingsPosters->id }}" action="{{ route('settings.update', $settingsPosters->id) }}" method="POST" enctype="multipart/form-data" class="hidden">
                                @csrf
                                @method('PUT')
                                <input type="text" class="text-lg w-full font-semibold text-slate-700" name="name" value="{{ $settingsPosters->name }}">
                                <div class="flex justify-between items-center mt-4">
                                    <input type="file" name="image" class="w-full" id="image_input_poster_{{ $settingsPosters->id }}" accept="image/*">
                                </div>
                                <div class="flex justify-between mt-4">
                                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md ml-2">Lưu</button>
                                    <button type="button" class="bg-gray-400 hover: text-white py-2 px-4 rounded-md cancel-btn">Hủy</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div id="section-logo" class="content-section">
            <div class="flex justify-between items-center m-4">
                <h2 class="text-xl font-semibold text-white mb-4">Logo</h2>
            </div>
            <div class="grid grid-cols-3 md:grid-cols-5 lg:grid-cols-5 gap-6">
                <!-- Thêm hình ảnh và thông tin cho mục Logo -->
                @foreach ($settingsLogo as $settingsLogos)
                <div class="bg-slate-200 shadow-md rounded-lg overflow-hidden">
                    <img id="image_logo_{{ $settingsLogos->id }}" src="{{ asset($settingsLogos->images_url) }}" alt="Logo" class="w-full" width="">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-slate-900 name-btn">{{ $settingsLogos->name }}</h2>
                        <div class="mt-4">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md edit-btn">Chỉnh sửa</button>
                            <a href="{{ route('settings.destroy', $settingsLogos->id  ) }}"><button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md ml-2 delete-btn">Xóa</button></a>
                            <form id="edit_form_logo_{{ $settingsLogos->id }}" action="{{ route('settings.update', $settingsLogos->id) }}" method="POST" enctype="multipart/form-data" class="hidden">
                                @csrf
                                @method('PUT')
                                <input type="text" class="text-lg font-semibold text-slate-700" name="name" value="{{ $settingsLogos->name }}">
                                <div class="flex justify-between items-center mt-4">
                                    <input type="file" class="w-4/12" name="image" id="image_input_logo_{{ $settingsLogos->id }}" accept="image/*">
                                    <div class="flex">
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md ml-2">Lưu</button>
                                        <button type="button" class="bg-gray-400 hover: text-white py-2 px-4 rounded-md  cancel-btn">Hủy</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Các hình ảnh và thông tin khác của Logo -->
            </div>
        </div>
        <div id="section-category" class="content-section">
            <table class="table-auto w-full my-6 rounded-lg overflow-hidden text-sm text-slate-900">
                <thead>
                    <tr class="text-left bg-primary">
                        <th class="px-4 py-2"></th>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Tên</th>
                        <th class="px-4 py-2">Last Update</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($imageTypes as $index => $imageType)
                    <tr class="{{ $index % 2 == 0 ? 'bg-secondary' : 'bg-pale-dark' }}">
                        <td class="px-4 py-2"><input type="checkbox"></td>
                        <td class="px-4 py-2">{{ $imageType->id }}</td>
                        <td class="px-4 py-2">{{ $imageType->name }}</td>
                        <td class="px-4 py-2">{{ $imageType->updated_at }}</td>
                        <td class="px-4 py-2">
                            <div x-data="{ isOpen: false }" x-init="() => { isOpen = false }" @click.away="isOpen = false" class="detail-btn">
                                <button @click="isOpen = !isOpen" class="text-white pl-4 pt-2 focus:outline-none text-2xl">...</button>
                                <div x-show="isOpen" class="absolute right-40 mt-2 w-20 bg-main border rounded-md shadow-lg z-10" @click="isOpen = false">
                                    <button onclick="edit_category('{{ $imageType->id }}', '{{ $imageType->name }}')" class="block w-full px-2 py-2 text-white hover:bg-gray-800">Sửa</button>
                                    <form action="{{ route('settings.category.destroy', ['id' => $imageType->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="block w-full text-center px-4 py-2 text-red-400 hover:bg-gray-800 hover:text-red-500">Xóa</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex justify-between mr-8">
                <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md" onclick="new_category()">Thêm mới danh mục ảnh</button>
            </div>
        </div>
    </div>
</div>

<div class="relative z-10 form_add_new" role="dialog" aria-modal="true" style="display: none;">
    <div class="fixed inset-0 hidden bg-gray-500 bg-opacity-75 transition-opacity md:block" aria-hidden="true"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-stretch justify-center text-center md:items-center md:px-2 lg:px-4">
            <div class="flex w-full transform text-left text-base transition md:my-8 md:max-w-2xl md:px-4 lg:max-w-4xl">
                <div class="relative flex w-full items-center overflow-hidden bg-slate-200 px-4 pb-8 pt-14 shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">
                    <button type="button" class="absolute right-4 top-4 text-gray-400 hover:text-gray-500 sm:right-6 sm:top-8 md:right-6 md:top-6 lg:right-8 lg:top-8" onclick="remove_add_new()">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <div class="grid w-full grid-cols-1 items-start gap-x-6 gap-y-8 sm:grid-cols-12 lg:gap-x-8">
                        <div class="overflow-hidden rounded-lg bg-gray-100 sm:col-span-5 lg:col-span-6">
                            <h2 class="text-xl font-bold text-gray-900 sm:pr-12">Xem trước</h2>
                            <img id="previewImage" src="https://images.pexels.com/photos/2047905/pexels-photo-2047905.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Preview image" class="object-cover object-center">
                        </div>
                        <div class="sm:col-span-7 lg:col-span-6">
                            <h2 class="text-2xl font-bold text-gray-900 sm:pr-12">Thêm mới ảnh</h2>
                            <section aria-labelledby="options-heading" class="mt-10">
                                <form action="{{ route('settings.index') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <label for="productName" class="block text-sm font-medium leading-6 text-gray-900">Tên ảnh</label>
                                        <div class="relative mt-2 rounded-md shadow-sm">
                                            <input type="text" name="name" id="name" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập tên ảnh">
                                        </div>
                                    </div>
                                    <div class="my-8">
                                        <label for="image_type_id" class="block text-sm font-medium leading-6 text-gray-900">Danh mục ảnh</label>
                                        <select id="image_type_id" name="image_type_id" class="w-full">
                                            @foreach ($imageTypes as $image)
                                            <option value="{{ $image->id }}">{{ $image->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="my-8">
                                        <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Chọn ảnh</label>
                                        <input type="file" name="images_url" id="images_url" class="block w-full rounded-md py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" onchange="previewImage(event)">
                                    </div>
                                    <button type="submit" class="mt-6 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Lưu</button>
                                </form>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="relative z-10 new_category" role="dialog" aria-modal="true" style="display: none;">
    <div class="fixed inset-0 hidden bg-gray-500 bg-opacity-75 transition-opacity md:block" aria-hidden="true"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-stretch justify-center text-center md:items-center md:px-2 lg:px-4">
            <div class="flex w-full transform text-left text-base transition md:my-8 md:max-w-2xl md:px-4 lg:max-w-4xl">
                <div class="relative flex w-full items-center overflow-hidden bg-slate-200 px-4 pb-8 pt-14 shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">
                    <button type="button" class="absolute right-4 top-4 text-gray-400 hover:text-gray-500 sm:right-6 sm:top-8 md:right-6 md:top-6 lg:right-8 lg:top-8" onclick="remove_add_new()">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class="w-full">
                        <h2 class="text-2xl font-bold text-gray-900 sm:pr-12">Thêm danh mục ảnh</h2>
                        <section aria-labelledby="options-heading" class="mt-10">
                            <form action="{{ route('settings.category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <label for="productName" class="block text-sm font-medium leading-6 text-gray-900">Tên danh mục</label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <input type="text" name="name" id="name" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập tên ảnh">
                                    </div>
                                </div>
                                <button type="submit" class="mt-6 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Lưu</button>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="relative z-10 edit_category" role="dialog" aria-modal="true" style="display: none;">
    <div class="fixed inset-0 hidden bg-gray-500 bg-opacity-75 transition-opacity md:block" aria-hidden="true"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-stretch justify-center text-center md:items-center md:px-2 lg:px-4">
            <div class="flex w-full transform text-left text-base transition md:my-8 md:max-w-2xl md:px-4 lg:max-w-4xl">
                <div class="relative flex w-full items-center overflow-hidden bg-slate-200 px-4 pb-8 pt-14 shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">
                    <button type="button" class="absolute right-4 top-4 text-gray-400 hover:text-gray-500 sm:right-6 sm:top-8 md:right-6 md:top-6 lg:right-8 lg:top-8" onclick="remove_new_category()">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class="w-full">
                        <h2 class="text-2xl font-bold text-gray-900 sm:pr-12">Sửa danh mục ảnh</h2>
                        <section aria-labelledby="options-heading" class="mt-10">
                            <form action="{{ route('settings.category.update', 'id') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Tên danh mục</label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <input type="text" name="name" id="name" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập tên ảnh">
                                    </div>
                                </div>
                                <button type="submit" class="mt-6 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Lưu</button>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    document.addEventListener("DOMContentLoaded", function() {
        const menuItems = document.querySelectorAll('.menu-item');
        const contentSections = document.querySelectorAll('.content-section');
        contentSections[0].classList.add('active');
        menuItems[0].classList.add('active');
        menuItems.forEach((menuItem, index) => {
            menuItem.addEventListener('click', function() {
                contentSections.forEach(section => {
                    section.classList.remove('active');
                });
                menuItems.forEach(item => {
                    item.classList.remove('active');
                });
                contentSections[index].classList.add('active');
                menuItem.classList.add('active');
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-btn');
        const cancelButtons = document.querySelectorAll('.cancel-btn');

        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const parentDiv = this.closest('.bg-slate-200');
                const image = parentDiv.querySelector('img');
                const form = parentDiv.querySelector('form');
                const deleteButton = parentDiv.querySelector('.delete-btn');
                const nameButton = parentDiv.querySelector('.name-btn');
                const imageInput = form.querySelector('input[type=file]');
                const cancelButton = form.querySelector('.cancel-btn');

                form.classList.remove('hidden');
                nameButton.style.display = 'none';
                deleteButton.style.display = 'none';
                this.classList.add('hidden');

                cancelButton.addEventListener('click', function() {
                    form.classList.add('hidden');
                    nameButton.style.display = 'block';
                    deleteButton.style.display = 'inline-block';
                    button.classList.remove('hidden');
                });

                imageInput.addEventListener('change', function() {
                    const file = this.files[0];
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        image.src = e.target.result;
                    };

                    reader.readAsDataURL(file);
                });
            });
        });
    });
</script>

<script>
    function form_add_new() {
        const divElement = document.querySelector('.form_add_new');
        divElement.style.display = 'block';
    }

    function remove_add_new() {
        const divElement = document.querySelector('.form_add_new');
        divElement.style.display = 'none';
    }
</script>
<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function() {
            var dataURL = reader.result;
            var imgElement = document.getElementById('previewImage');
            imgElement.src = dataURL;
        };

        reader.readAsDataURL(input.files[0]);
    }
</script>
<script>
    function new_category() {
        const divElement = document.querySelector('.new_category');
        divElement.style.display = 'block';
    }

    function remove_new_category() {
        const divElement = document.querySelector('.new_category');
        divElement.style.display = 'none';
    }

    function edit_category(id, name) {
        const divElement = document.querySelector('.edit_category');
        const formElement = divElement.querySelector('form');
        formElement.action = `{{ route('settings.category.update', '') }}/${id}`;
        divElement.style.display = 'block';
        formElement.querySelector('#name').value = name || '';
    }



    function remove_edit_category() {
        const divElement = document.querySelector('.edit_category');
        divElement.style.display = 'none';
    }
</script>
</div>
@include('admin.layout.fotter')