<style>
    .setting_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>
@include('admin.layout.header')
<div class="m-4 pt-20">
    <div class="flex justify-between text-xs sm:text-sm">
        <div class="flex text-gray-600">
            <form action="{{ route('setting') }}" method="GET" class="flex">
                <div class="ml-2 sm:ml-4 flex">
                    <label for="startDate" class="block text-gray-500 mt-1">Từ ngày</label>
                    <input class="p-1.5 sm:p-2 rounded-lg ml-2" type="date" id="startDate" name="start_date">
                </div>
                <div class="ml-2 sm:ml-4 flex">
                    <label for="endDate" class="block text-gray-500 mt-1">Đến ngày</label>
                    <input class="p-1.5 sm:p-2 rounded-lg ml-2" type="date" id="endDate" name="end_date">
                </div>
                <div class="ml-2 sm:ml-6">
                    <div class="relative rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-2">
                            <ion-icon class="text-gray-500 sm:text-sm" name="search-outline"></ion-icon>
                        </div>
                        <input type="text" name="keyword" id="keyword" class="block w-full rounded-md border-0 py-1.5 sm:py-2 pl-5 pr-16 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Tìm kiếm">
                    </div>
                </div>
                <div class="ml-2 sm:ml-6">
                    <button type="submit" class="bg-indigo-600 text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-md">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
    <div class="flex flex-wrap justify-start items-center">
        <span class="text-sm sm:text-base mr-4">0 sản phẩm đã chọn</span>
        <button class="button_selected text-xs sm:text-sm"><ion-icon class="mr-2 mb-1 text-purple-700 " name="bag-check-outline"></ion-icon>Hết hàng</button>
        <button class="button_selected text-xs sm:text-sm"><ion-icon class="mr-2 mb-1 text-fuchsia-600 " name="cash-outline"></ion-icon>Giảm giá</button>
        <button class="button_selected text-xs sm:text-sm"><ion-icon class="mr-2 mb-1 text-blue-400 " name="apps-outline"></ion-icon>Chọn tất cả</button>
        <button class="button_selected text-xs sm:text-sm"><ion-icon class="mr-2 mb-1 text-blue-700 " name="file-tray-full-outline"></ion-icon>In mã QR</button>
        <button class="button_selected text-xs sm:text-sm"><ion-icon class="mr-2 mb-1 text-sky-500 " name="exit-outline"></ion-icon>Xuất file</button>
        <button class="button_selected text-xs sm:text-sm"><ion-icon class="mr-2 mb-1 text-red-500 " name="trash-outline"></ion-icon>Xóa</button>
    </div>
</div>
@include('admin.layout.fotter')