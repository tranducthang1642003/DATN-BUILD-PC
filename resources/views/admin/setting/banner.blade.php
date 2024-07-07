<style>
    .setting_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }

    /* CSS cho menu */
    .menu-item {
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .menu-item:hover {
        background-color: #edf2f7;
    }

    .menu-item.active {
        background-color: #edf2f7;
        font-weight: bold;
    }

    /* CSS cho nội dung */
    .content-section {
        display: none;
    }

    .content-section.active {
        display: block;
    }
</style>
@include('admin.layout.header')
<div class="m-4 pt-16">
    <h1 class="text-2xl font-semibold mb-4">Quản lý hình ảnh</h1>
    <div class="container mx-auto p-4 bg-white min-h-screen">
        <div class="flex mb-6 ">
            <div id="menu-banner" class="menu-item px-4 py-2 rounded-md mr-4">Banner</div>
            <div id="menu-poster" class="menu-item px-4 py-2 rounded-md mr-4">Poster</div>
            <div id="menu-logo" class="menu-item px-4 py-2 rounded-md mr-4">Logo</div>
        </div>
        <hr class="mb-4">
        <!-- Nội dung của từng mục -->
        <div id="section-logo" class="content-section">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Logo</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <!-- Thêm hình ảnh và thông tin cho mục Logo -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ asset('image/logo.svg') }}" alt="Logo" class="w-full" width="">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-800">Logo 1</h2>
                        <p class="text-gray-600 mt-2">Thông tin chi tiết về logo 1</p>
                        <div class="mt-4">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Chỉnh sửa</button>
                            <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md ml-2">Xóa</button>
                        </div>
                    </div>
                </div>
                <!-- Các hình ảnh và thông tin khác của Logo -->
            </div>
        </div>

        <div id="section-banner" class="content-section">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Banner top header</h2>
            <div class="">
                <!-- Thêm hình ảnh và thông tin cho mục Banner -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ asset('image/banner.webp') }}" alt="Banner" class="w-full" width="">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-800">Banner top header</h2>
                        <p class="text-gray-600 mt-2">Thông tin chi tiết về banner home</p>
                        <div class="mt-4">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Chỉnh sửa</button>
                            <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md ml-2">Xóa</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Banner</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Thêm hình ảnh và thông tin cho mục Banner -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ asset('image/bannre-pc.jpg') }}" alt="Banner" class="w-full">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-800">Banner Home</h2>
                        <p class="text-gray-600 mt-2">Thông tin chi tiết về banner home</p>
                        <div class="mt-4">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Chỉnh sửa</button>
                            <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md ml-2">Xóa</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ asset('image/bannre-pc.jpg') }}" alt="Banner" class="w-full">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-800">Banner Home</h2>
                        <p class="text-gray-600 mt-2">Thông tin chi tiết về banner home</p>
                        <div class="mt-4">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Chỉnh sửa</button>
                            <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md ml-2">Xóa</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <div id="section-poster" class="content-section">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Poster</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                <!-- Thêm hình ảnh và thông tin cho mục Poster -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="https://anphat.com.vn/media/banner/01_Jula6d3a3b63b24a183f22978ef03e59c8f.jpg" alt="Poster" width="100" class="ml-16">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-800">Poster 1</h2>
                        <p class="text-gray-600 mt-2">Thông tin chi tiết về poster 1</p>
                        <div class="mt-4">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Chỉnh sửa</button>
                            <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md ml-2">Xóa</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="https://anphat.com.vn/media/banner/01_Jula6d3a3b63b24a183f22978ef03e59c8f.jpg" alt="Poster" width="100" class="ml-16">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-800">Poster 1</h2>
                        <p class="text-gray-600 mt-2">Thông tin chi tiết về poster 1</p>
                        <div class="mt-4">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Chỉnh sửa</button>
                            <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md ml-2">Xóa</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="https://anphat.com.vn/media/banner/01_Jula6d3a3b63b24a183f22978ef03e59c8f.jpg" alt="Poster" width="100" class="ml-16">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-800">Poster 1</h2>
                        <p class="text-gray-600 mt-2">Thông tin chi tiết về poster 1</p>
                        <div class="mt-4">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Chỉnh sửa</button>
                            <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md ml-2">Xóa</button>
                        </div>
                    </div>
                </div>
                <!-- Các hình ảnh và thông tin khác của Poster -->
            </div>
        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Lấy các phần tử menu và nội dung
            const menuLogo = document.getElementById("menu-logo");
            const menuBanner = document.getElementById("menu-banner");
            const menuPoster = document.getElementById("menu-poster");
            const sectionLogo = document.getElementById("section-logo");
            const sectionBanner = document.getElementById("section-banner");
            const sectionPoster = document.getElementById("section-poster");

            // Mặc định hiển thị mục Logo
            sectionBanner.classList.add("active");

            // Bắt sự kiện click vào từng menu
            menuLogo.addEventListener("click", function() {
                // Ẩn tất cả các section và loại bỏ class active
                sectionLogo.classList.add("active");
                sectionBanner.classList.remove("active");
                sectionPoster.classList.remove("active");
                // Đánh dấu menu Logo là active, các menu khác bình thường
                menuLogo.classList.add("active");
                menuBanner.classList.remove("active");
                menuPoster.classList.remove("active");
            });

            menuBanner.addEventListener("click", function() {
                sectionLogo.classList.remove("active");
                sectionBanner.classList.add("active");
                sectionPoster.classList.remove("active");
                menuLogo.classList.remove("active");
                menuBanner.classList.add("active");
                menuPoster.classList.remove("active");
            });

            menuPoster.addEventListener("click", function() {
                sectionLogo.classList.remove("active");
                sectionBanner.classList.remove("active");
                sectionPoster.classList.add("active");
                menuLogo.classList.remove("active");
                menuBanner.classList.remove("active");
                menuPoster.classList.add("active");
            });
        });
    </script>
</div>
@include('admin.layout.fotter')