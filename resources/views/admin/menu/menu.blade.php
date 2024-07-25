<style>
    .setting_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
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
        <a class="hover:text-slate-50" href="{{ route('menu.index') }}"><span>Menu</span></a>
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
    <div class="flex justify-between text-sm">
        <div class="flex text-white">
            <form action="{{ route('product') }}" method="GET" class="flex">
                <div class="ml-2 sm:ml-4 flex">
                    <label for="startDate" class="block text-gray-500 mt-1">Từ ngày</label>
                    <input class="p-1.5 sm:p-2 rounded-lg ml-2 bg-main text-gray-500 text-sm" type="date" id="startDate" name="start_date">
                </div>
                <div class="ml-2 sm:ml-4 flex">
                    <label for="endDate" class="block text-gray-500 mt-1">Đến ngày</label>
                    <input class="p-1.5 sm:p-2 rounded-lg ml-2 bg-main text-gray-500 text-sm" type="date" id="endDate" name="end_date">
                </div>
                <div class="ml-2 sm:ml-6">
                    <div class="relative rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-2">
                            <ion-icon class="text-white sm:text-sm" name="search-outline"></ion-icon>
                        </div>
                        <input type="text" name="keyword" id="keyword" class="block w-full bg-main rounded-md border-0 py-1.5 sm:py-2 pl-5 pr-16 text-white ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Tìm kiếm">
                    </div>
                </div>
                <div class="ml-2 sm:ml-6">
                    <button type="submit" class="bg-blue-400 hover:bg-blue-500 px-3 sm:px-4 py-1.5 sm:py-2 rounded-md">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
    <table class="table-auto w-full my-6 rounded-lg overflow-hidden text-sm text-slate-700">
        <thead>
            <tr class="text-left bg-primary">
                <th class="px-4 py-2"></th>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Tên</th>
                <th class="px-4 py-2">Hình ảnh</th>
                <th class="px-4 py-2">Đường dẫn</th>
                <th class="px-4 py-2">Last Update</th>
                <th class="px-4 py-2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $index => $menu)
            <tr class="{{ $index % 2 == 0 ? 'bg-secondary' : 'bg-pale-dark' }}">
                <td class="px-4 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2">{{ $menu->id }}</td>
                <td class="px-4 py-2">{{ $menu->name }}</td>
                <td class="px-4 py-2"><img src="{{ asset($menu->image) }}" width="80" alt=""></td>
                <td class="px-4 py-2">{{ $menu->url }}</td>
                <td class="px-4 py-2">{{ $menu->updated_at }}</td>
                <td class="px-4 py-2">
                    <div x-data="{ isOpen: false }" x-init="() => { isOpen = false }" @click.away="isOpen = false" class="detail-btn">
                        <button @click="isOpen = !isOpen" class="text-white pl-4 pt-2 focus:outline-none text-2xl">...</button>
                        <div x-show="isOpen" class="absolute right-20 mt-2 w-20 bg-main border rounded-md shadow-lg z-10" @click="isOpen = false">
                            <button onclick="form_edit('{{ $menu->id }}', '{{ $menu->name }}', '{{ $menu->url }}', '{{ $menu->image }}')" class="block w-full py-2 text-white hover:bg-gray-800">Sửa</button>
                            <form action="{{ route('menu.destroy', ['id' => $menu->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="block w-full text-center py-2 text-red-400 hover:bg-gray-800 hover:text-red-500">Xóa</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex justify-between mr-8">
        <button class="bg-blue-400 hover:bg-blue-500 text-white py-2 px-4 rounded-md" onclick="form_add_new()">Thêm mới</button>
        <div>
            {{ $menus->links() }}
        </div>
    </div>
</div>
</div>
<div class="relative z-10 form_add_new" role="dialog" aria-modal="true" style="display: none;">
    <div class="fixed inset-0 hidden bg-gray-500 bg-opacity-75 transition-opacity md:block" aria-hidden="true"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-stretch justify-center text-center md:items-center md:px-2 lg:px-4">
            <div class="flex w-full transform text-left text-base transition md:my-8 md:max-w-2xl md:px-4 lg:max-w-4xl">
                <div class="relative flex w-full items-center overflow-hidden bg-white px-4 pb-8 pt-14 shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">
                    <button type="button" class="absolute right-4 top-4 text-gray-400 hover:text-gray-500 sm:right-6 sm:top-8 md:right-6 md:top-6 lg:right-8 lg:top-8" onclick="remove_add_new()">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class="w-full">
                        <h2 class="text-2xl font-bold text-gray-900 sm:pr-12">Thêm menu</h2>
                        <section aria-labelledby="options-heading" class="mt-10">
                            <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <label for="productName" class="block text-sm font-medium leading-6 text-gray-900">Tên menu</label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <input type="text" name="name" id="name" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập tên ảnh">
                                    </div>
                                </div>
                                <div>
                                    <label for="url" class="block text-sm font-medium leading-6 text-gray-900">Đường dẫn</label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <input type="text" name="url" id="url" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập đường dẫn">
                                    </div>
                                </div>
                                <div class="">
                                    <label for="image" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Hình ảnh</label>
                                    <input type="file" name="image" id="image" accept="image/*">
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
<div class="relative z-10 form_edit" role="dialog" aria-modal="true" style="display: none;">
    <div class="fixed inset-0 hidden bg-gray-500 bg-opacity-75 transition-opacity md:block" aria-hidden="true"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-stretch justify-center text-center md:items-center md:px-2 lg:px-4">
            <div class="flex w-full transform text-left text-base transition md:my-8 md:max-w-2xl md:px-4 lg:max-w-4xl">
                <div class="relative flex w-full items-center overflow-hidden bg-white px-4 pb-8 pt-14 shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">
                    <button type="button" class="absolute right-4 top-4 text-gray-400 hover:text-gray-500 sm:right-6 sm:top-8 md:right-6 md:top-6 lg:right-8 lg:top-8" onclick="remove_edit()">
                        <span class="sr-only">Đóng</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class="w-full">
                        <h2 class="text-2xl font-bold text-gray-900 sm:pr-12">Sửa menu</h2>
                        <section aria-labelledby="options-heading" class="mt-10">
                            <form id="editForm" action="{{ route('menu.update', '') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')

                                <input type="hidden" id="menu_id" name="menu_id">

                                <div>
                                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Tên menu</label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <input type="text" name="name" id="name" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-700 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập tên ảnh">
                                    </div>
                                </div>
                                <div>
                                    <label for="url" class="block text-sm font-medium leading-6 text-gray-900">Đường dẫn</label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <input type="text" name="url" id="url" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập đường dẫn">
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Hình ảnh</label>
                                    <img src="" alt="" id="image_preview" class="mt-2 max-w-xs">
                                    <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(event)">
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

@include('admin.layout.fotter')

<script>
    function form_add_new() {
        const divElement = document.querySelector('.form_add_new');
        divElement.style.display = 'block';
    }

    function remove_add_new() {
        const divElement = document.querySelector('.form_add_new');
        divElement.style.display = 'none';
    }

    function previewImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const imagePreview = document.getElementById('image_preview');
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function form_edit(id, name, url, img) {
        const divElement = document.querySelector('.form_edit');
        const formElement = divElement.querySelector('#editForm');
        formElement.action = `{{ route('menu.update', '') }}/${id}`;
        divElement.style.display = 'block';
        formElement.querySelector('#menu_id').value = id;
        formElement.querySelector('#name').value = name || '';
        formElement.querySelector('#url').value = url || '';

        const imagePreview = formElement.querySelector('#image_preview');
        imagePreview.src = img ? `{{ asset('${img}') }}` : '';
    }



    function remove_edit() {
        const divElement = document.querySelector('.form_edit');
        divElement.style.display = 'none';
    }
</script>